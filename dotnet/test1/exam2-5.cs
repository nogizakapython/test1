using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App02
{
    class Program
    {
        static void Main(string[] args)
        { 
            string str1,str2;
            int num1,num2;
            Console.Write("str1=");
            str1 = Console.ReadLine();
            num1 = Convert.ToInt32(str1);
            Console.Write("str2=");
            str2 = Console.ReadLine();
            num2 = Convert.ToInt32(str2);
            Console.WriteLine("num1 + num2 = {0}",num1+num2);
        }
    }
}