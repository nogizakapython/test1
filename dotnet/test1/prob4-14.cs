using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_14
{
    class prob4_14
    {
        static void Main(string[] args)
        {
            // int add_count = 0;
            // int minus_count = 0;
            // Random rnd = new Random();
            // int num = rnd.Next(1,11);
            for(int i=1;i<=100;i++){
                if (i % 10 == 0){
                    Console.Write(i);
                    Console.WriteLine();
                } else {
                    Console.Write(i + " ");
                }
                
            }
                
                    
        }
    }
}
