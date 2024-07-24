using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem8_5
{
    class Program
    {
        static void Main(string[] args)
        {
            int flag1 = 0;
            for(int i=1;i<=100;i++){
                if(i % 3 == 0){
                    flag1 += 1;
                }
                if(i % 10 == 3){
                    flag1 += 1;
                }
                if(i / 10 == 3){
                    flag1 += 1;
                }
                if(flag1 > 0){
                    Console.WriteLine(i);
                }
                flag1 = 0;
                
            }
        }
    }
}