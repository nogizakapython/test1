using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Problem3_2
{
    class Program
    {
        static void Main(string[] args)
        {   
            const int NUMBER = 4;
		    string num_s = Console.ReadLine();
            int num = int.Parse(num_s);
            if (num != 4){
                Console.WriteLine("{0}ではありません",NUMBER);
            }    
        }
    }
}