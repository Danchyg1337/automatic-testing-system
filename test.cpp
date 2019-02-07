#include <windows.h>
#include <iostream>
using namespace std;
int main(){
	
	STARTUPINFO cif;
	ZeroMemory(&cif,sizeof(STARTUPINFO));
	PROCESS_INFORMATION pi;
	freopen("nums.txt", "r", stdin);
	if (CreateProcess("C:\\Users\\1337\\Desktop\\what\\yeah.exe","yeah.exe < nums.txt",
		NULL,NULL,FALSE,NULL,NULL,NULL,&cif,&pi)==TRUE)
	{
		cout << "process" << endl;
		cout << "handle " << pi.hProcess << endl;
	}
	Sleep(2000);
	
}
