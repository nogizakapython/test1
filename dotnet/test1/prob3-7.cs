using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem3_7
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("数値を入力 ");
            int num = int.Parse(Console.ReadLine());
            if (num % 2 == 0)
            {
                Console.WriteLine("{0}は偶数です。",num);
            } else {
                Console.WriteLine("{0}は奇数です。",num);
            }
        }
    }
}