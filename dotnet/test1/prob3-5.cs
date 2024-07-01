using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Problem3_3
{
    class Program
    {
        static void Main(string[] args)
        {   
            string num_s = Console.ReadLine();
            int num = int.Parse(num_s);
            if (num > 30 && num < 70){
                Console.WriteLine("30より大きく、70より小さい整数です");
            }    
        }
    }
}