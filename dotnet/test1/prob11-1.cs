using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob11_1
{
    class Program
    {
        static int Add(int a,int b)
        {
            return a + b;
        }
        static int Sub(int a,int b)
        {
            return a - b;
        }

        static void Main(string[] args)
        {
            //  キーボードから整数の値を入力
            Console.Write("a=");
            int a = int.Parse(Console.ReadLine());
            Console.Write("b=");
            int b = int.Parse(Console.ReadLine());
            Console.WriteLine("a + b = {0}",Add(a,b));
            Console.WriteLine("a - b = {0}",Sub(a,b));
        }
    }
}