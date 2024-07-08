using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_15
{
    class prob4_15
    {
        static void Main(string[] args)
        {
            int start_num = 1;
            int end_num = 9;
            for(int i=start_num;i<=end_num;i++){
                for(int j=start_num;j<=end_num;j++){
                    int ans = i * j;
                    if (j == end_num){

                        Console.Write("{0}*{1}={2}",i,j,ans);
                        Console.WriteLine();
                    } else {
                        Console.Write("{0}*{1}={2} ",i,j,ans);
                    }

                }
                
                
            }
                
                    
        }
    }
}
