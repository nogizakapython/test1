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
            if (num <= 20 || num >= 80){
                Console.WriteLine("20以下か80以上の整数です");
            }    
        }
    }
}