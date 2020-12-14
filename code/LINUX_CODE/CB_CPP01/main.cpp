#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

using namespace std;

int main()
{
    cout << "Hello world!" << endl;
    char chrInput[1000];
    char chrOutput[2000];
    FILE *pf01=NULL;
    FILE *pf02=NULL;
    pf01=fopen("List.txt","r");
    pf02=fopen("runweb.sh","w");
    while(fgets(chrInput,999,pf01)!=NULL)
    {
        if(chrInput[strlen(chrInput)-1]=='\n')
            chrInput[strlen(chrInput)-1]='\0';
        sprintf(chrOutput,"chromium http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php --user-agent=\"%s\"  > output.log 2>&1 &",chrInput);
        fprintf(pf02,"%s\n",chrOutput);
        fprintf(pf02,"sleep 600\n");
        fprintf(pf02,"ps aux | grep chrom | awk '{print $2}' | xargs kill -9\n");
    }
    fclose(pf01);
    fclose(pf02);
    return 0;
}
