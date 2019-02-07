#include <iostream>
#include <windows.h>
#include <fstream>
using namespace std;

class Compare {
	public:
		
		bool compare(char* in, char* out){
			ifstream Fin(in), Fout(out);
			string one, two;
			while(Fin.good()){
				getline(Fin, one);
				getline(Fout, two);
				if(one!=two){
					return 0;
				}
			}
			Fin.close();
			Fout.close();
			return 1;
		}
};


int main()
{	
	STARTUPINFO cif; 
	ZeroMemory(&cif,sizeof(STARTUPINFO));
	PROCESS_INFORMATION pi;
	char cmdLine[] = "g++ code.cpp -o ..//place//cpp//yeah.exe";
	BOOL bOK = CreateProcess(
   		NULL,	// pointer to name of executable module
   		cmdLine,// pointer to command line string
   		NULL,	// pointer to process security attributes
   		NULL,	// pointer to thread security attributes
   		TRUE,	// handle inheritance flag
   		NULL,	// creation flags
				// CREATE_NEW_CONSOLE | NORMAL_PRIORITY_CLASS | DEBUG_PROCESS	
				// creation flags
   		NULL,	// pointer to new environment block
   		NULL,	// pointer to current directory name
   		&cif,	// pointer to STARTUPINFO
   		&pi 	// pointer to PROCESS_INFORMATION
   	);
	if (bOK==TRUE)
	{
		Sleep(2000);
		char pte[] = "..//place//cpp//yeah.exe";
		char nums[] = "..//place//cpp//nums.txt";
		char numsOUT[] = "..//place//cpp//numsOUT.txt";
		TerminateProcess(pi.hProcess, NULL);
		STARTUPINFO cir;
		ZeroMemory(&cir,sizeof(STARTUPINFO));
		PROCESS_INFORMATION pir;
		freopen(nums, "r", stdin);
		freopen(numsOUT, "w", stdout);
		if (CreateProcess(NULL, pte,
		NULL,NULL,FALSE,NULL,NULL,NULL,&cir,&pir)==TRUE)
		{
			ofstream errorFile("..//place//cpp//error.txt");
			Compare comp;
			if(comp.compare(nums, numsOUT)){
				errorFile<<"Done!";
			}
			else{
				errorFile<<"Error";
			}
			
		}
		else{
			cout<<"Error while running code\n";
			return 1;
		}
	}
	else{
		cout<<"Error while compiling code\n";
		return 1;
	}
	return 0;
}
