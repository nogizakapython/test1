using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem8_8
{
    class Program
    {
        static void Main(string[] args)
        {
            Random rnd = new Random();
            int num = rnd.Next(1,1000);
            for(int i=1;i<=num;i++){
                if(num % i == 0){
                    Console.WriteLine(i);
                }
            }
        }
    }
}