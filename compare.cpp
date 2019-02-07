#include <iostream>
#include <fstream>
using namespace std;

class Compare {
	public:
		
		bool compare(const char* in, char* out){
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

int main(int argc,const char *argv[]){
	std::string par1 = argv[1], par2 = argv[2];
	std::string nums = std::string("..//output//") + (par1 + "//")+ (par2+ ".txt");
	char numsOUT[] = "..//place//cpp//numsOUT.txt";
	
	ofstream errorFile("..//place//cpp//error.txt");
	
	Compare comp;
	
		if(comp.compare(nums.c_str(), numsOUT)){
			errorFile<<"Done!";
		}
		else{
			errorFile<<"Wrong answer";
			return 1;
		}
				
	errorFile.close();
	return 0;
}
