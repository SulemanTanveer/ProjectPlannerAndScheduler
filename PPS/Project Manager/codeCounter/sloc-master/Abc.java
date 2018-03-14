import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.PrintStream;
import java.io.PrintWriter;
import java.util.Arrays;
import java.util.Scanner;

public class sort {

	public static void main(String[] args) throws FileNotFoundException {
		// TODO Auto-generated method stub

		Scanner in = new Scanner(new FileReader("input.txt"));
		Scanner ex = new Scanner(new FileReader("expected.txt"));
		 PrintStream out = new PrintStream(new FileOutputStream("testlogfile.txt"));
		 out.println("Test # \t Actual output\t\t\tExpected output\t\t\tverdict");
		 int count=1;
		 
		 while(in.hasNextLine()){
		String s = in.nextLine();
		String str = ex.nextLine();
		String[] part = s.split(" ");
		
		int length = part.length;
		String order = part[0];
		
		

		int array[] = new int[length - 1];
		for (int i = 0; i < length - 1; i++) {
			array[i] = Integer.parseInt(part[i + 1]);
			//System.out.print("  " + array[i]);
		}
		
		array=sorting(array,order);
		
		
		
		String output=Arrays.toString(array);
		output=output.replaceAll(",", "");
		output=order+" "+output.substring(1, output.length()-1);
		System.out.print("The final sorted string is "+ output);
		
		if(str.equals(output))
		{
			System.out.println("\nverdict is pass ");
			String text=count+"\t " + s+" \t\t\t "+output+ " \t\t\t pass";
			out.println(text);
		}
		else
		{System.out.println("\nverdict is fail ");
		String text= count+"\t "+s+" \t\t\t "+output+ " \t\t\t fail";
		out.println(text);
			
		}
		count++;
		 }
	}
	
	
	
	 public static int[] sorting(int a[],String order) 
	    {

			if (order.equals("A")) {
			//	System.out.println("\nAscending array is;  " );
				for (int i = 0; i < a.length ; i++) {
					for (int j = i; j < a.length; j++) {
						if (a[i] > a[j]) {
							int temp = a[i];
							a[i] = a[j];
							a[j] = temp;
						}
					}
				}
				for (int i = 0; i < a.length; i++);
				//	System.out.print(a[i]+" ");
			}

			else if (order.equals("D")) {
				//System.out.println("\nDescending array is;  " );

				for (int i = 0; i < a.length ; i++) {
					for (int j = i; j < a.length ; j++) {
						if (a[i] < a[j]) {
							int temp = a[i];
							a[i] = a[j];
							a[j] = temp;
						}
					}
				}
				for (int i = 0; i < a.length ; i++);
				//	System.out.print(a[i]+" ");
				
				
				
			}

			
		 
		 
		 
		 return a;
	
	    }
	
	
	
	
	

	}







