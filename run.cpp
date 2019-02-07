#include <windows.h>
#include <iostream>
#include <string>

int main(int argc,const char *argv[]){
	STARTUPINFO cir;
	ZeroMemory(&cir,sizeof(STARTUPINFO));
	PROCESS_INFORMATION pir;
	char pte[] = "..//place//cpp//yeah.exe";
	std::string par1 = argv[1], par2 = argv[2];
	std::string nums2 = std::string("..//input//") + (par1 + "//")+ (par2+ ".txt");
	char numsOUT[] = "..//place//cpp//numsOUT.txt";
	char nums[20];
	for(int t=0;t<nums2.size();t++){
		nums[t]=nums2.at(t);
	}

	freopen(nums, "r", stdin);
	freopen(numsOUT, "w", stdout);
	
	if (CreateProcess(NULL, pte,NULL,NULL,TRUE,NULL,NULL,NULL,&cir,&pir)==TRUE)
	{
		return 0;
	}
	return 1;
}
