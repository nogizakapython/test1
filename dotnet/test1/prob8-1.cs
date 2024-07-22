using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem6_3
{
    class Program
    {
        static void Main(string[] args)
        {
            for(int a=1;a<=100;a++){
                for(int b=1;b<=100;b++){
                    for(int c=1;c<=100;c++){
                        double sum1 = Math.Pow(a,2) + Math.Pow(b,2);
                        double sum2 = Math.Pow(c,2);
                        if(sum1 == sum2){
                            Console.WriteLine("a={0},b={1},c={2}",a,b,c);
                        }
                    }
                }
            }
        }
    }
}