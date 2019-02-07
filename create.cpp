#include <windows.h>

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
		return 0;
	}
	else{
		return 1;
	}
}
