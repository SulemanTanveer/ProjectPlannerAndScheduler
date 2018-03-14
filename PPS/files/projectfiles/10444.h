
#include <iostream>
#include <string>
#include <sstream>
#include <fstream>
#include <conio.h>

using namespace std;

class sort {

public:
    sort(string, string);
    void input();
    void convert(string, string);
    void Ascending(int[], int);
    void Descending(int[], int);
    void oracle(int[], int[], string, int, int);
    void oracle(string, string);
    ~sort();

private:
    ifstream inp, exp;
    string input1, input2;
    int* inpArray;
    int* expArray;
    int tcount;
};

