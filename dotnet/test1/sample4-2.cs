using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample4_2
{
    class Program
    {
        static void Main(string[] args)
        {
            //  forの二重ループ
            for(int i = 1;i <= 2;i++){
                for(int j = 1; j <=3 ; j++){
                    int k = i + j;
                    Console.Write(i+"+" + j +  "=" + k +" ");
                }
                Console.WriteLine();
            }
        }
    }
}