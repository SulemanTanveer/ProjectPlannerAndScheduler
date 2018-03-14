#include "stdafx.h"
#include <iostream>
#include <string>
#include <sstream>
#include <fstream>
#include <conio.h>
#include "sorting.h"
using namespace std;

sort::sort(string inpFile, string expFile)
{
    inp.open(inpFile);
    exp.open(expFile);
    tcount = 1;
}

void sort::input()
{
    string str1, str2;

    if (exp && inp) {
        while (!inp.eof() || !exp.eof()) {

            getline(inp, str1);
            getline(exp, str2);
            convert(str1, str2);
        }
    }
    else {

        cout << "File not exist";
    };

    exp.close();
    inp.close();
    cout << "\n\nTest Log File Is Ready...!" << endl;
    getch();
}

void sort::convert(string inp, string exp)
{

    if (inp.empty() || inp.length() < 3) {
        oracle(inp, exp);
    }
    else {
        char chr = inp[0];
        int size = inp.size();
        int count0 = 1;
        int count2 = 0;

        for (int i = 0; i < inp.length(); i++) {
            if (inp[i] == ',')
                count2++;
        }
        for (int i = 0; i < exp.length(); i++) {
            if (exp[i] == ',')
                count0++;
        }

        int* inpArray = new int[count2];
        int* expArray = new int[count0];

        if (chr == 'a' || chr == 'A' || chr == 'd' || chr == 'D') {

            string n, n2;
            int i = 0, j = 0;
            string str = inp;
            istringstream is(str);
            int count = 0;
            while (getline(is, n, ',')) {
                if (count == 0) {
                    count++;
                }
                else {

                    inpArray[i] = stoi(n);
                    i++;
                }
            }

            //////////////////////////exp//////////
            string str2 = exp;
            istringstream iss(str2);
            while (getline(iss, n2, ',')) {

                expArray[j] = stoi(n2);
                j++;
            }

            if (chr == 'a' || chr == 'A') {

                Ascending(inpArray, count2);
            }
            else if (chr == 'd' || chr == 'D') {

                Descending(inpArray, count2);
            }

            oracle(inpArray, expArray, inp, count2, count0);
        }
        else {
            oracle(inp, exp);
        }
    }
}

/////////////////////////////////sort/////////////////////

void sort::Ascending(int arr[], int size)
{
    int temp;
    for (int i = 0; i < size; i++) {
        for (int j = i; j < size; j++) {
            if (arr[i] >= arr[j]) {
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
}

void sort::Descending(int arr[], int size)
{
    int temp;
    for (int i = 0; i < size; i++) {
        for (int j = i; j < size; j++) {
            if (arr[i] <= arr[j]) {
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
}

void sort::oracle(int inp[], int exp[], string input, int inpSize, int expSize)
{
    cout << "\nTest Case No: ";
    cout << tcount;
    cout << "\n\nInput:\n";
    cout << input;
    cout << "\n\nObserved Output\n";
    for (int i = 0; i < inpSize; i++)
        cout << inp[i] << " ";

    cout << "\n\nExpected Output\n";
    for (int i = 0; i < expSize; i++)
        cout << exp[i] << " ";

    {
        bool flag = true;
        for (int i = 0; i < expSize; i++) {
            if (exp[i] != inp[i]) {
                flag = false;
                cout << "\nVerdic:\nTest Failed\n";
                break;
            }
        }
        if (flag) {
            cout << "\n\nVerdic:\nTest Passed\n";
        }
        cout << "----------------------------";
        ofstream testlog("TestLogFile.txt", ios::app);
        testlog << "---------------------\n";
        testlog << "Test# " << tcount << endl;
        testlog << "---------------------\n";

        testlog << "Input: \n";
        {
            testlog << input;
        }
        testlog << "\n\nExpected Result: \n";
        for (int i = 0; i < inpSize; i++) {
            testlog << exp[i];
            if ((i + 1) != expSize)
                testlog << ',';
        }
        testlog << "\n\nObserved Result: \n";
        for (int i = 0; i < inpSize; i++) {
            testlog << inp[i];
            if ((i + 1) != inpSize)
                testlog << ',';
        }
        testlog << "\n\n";
        testlog << "Verdict:  ";
        if (flag == true)
            testlog << "Pass";
        else if (flag == false)
            testlog << "Fail";
        testlog << "\n\n";
        tcount++;
        testlog.close();
    }
}

void sort::oracle(string inp, string exp)
{
    cout << "\nTest Case No: ";
    cout << tcount;
    cout << "\n\nInput:\n";

    string inv = "Invalid Request";

    if (inp.length() < 1) {
        cout << "Empty Sequence";
    }
    else
        cout << inp;
    cout << "\n\nObserved Result:\n";
    cout << inv;
    cout << "\n\nExpected Result:\n";
    {
        cout << exp;
    }
    bool flag = false;
    if (exp == inv) {
        flag = true;
    }
    if (flag) {
        cout << "\n\nVerdic:\nTest Passed\n";
    }
    else {
        cout << "\n\nVerdic:\nTest Failed\n";
    }

    ofstream testlog("TestLogFile.txt", ios::app);
    testlog << "---------------------\n";
    testlog << "Test# " << tcount << endl;
    testlog << "---------------------\n";
    testlog << "Input:\n";
    if (inp.length() >= 1) {
        testlog << inp;
    }
    else {
        testlog << "Empty Sequence";
    }
    testlog << "\n\nExpected Output: \n";
    {
        testlog << exp;
    }
    testlog << "\n\nObserved Output: \n";

    {
        testlog << inv;
    }
    testlog << "\n\n";
    testlog << "Verdict:  ";
    if (flag == true)
        testlog << "Pass";
    else if (flag == false)
        testlog << "Fail";
    testlog << "\n\n";
    tcount++;
    testlog.close();

    cout << "----------------------------";
}

sort::~sort()
{
    delete[] expArray;
    delete[] inpArray;
}

