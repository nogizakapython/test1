using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob11_2_1
{
    class Program
    {
        static int Mul(int a, int b)
        {
            return a * b;
        }
        static int Mul(int a, int b, int c)
        {
            return a * b * c;
        }
        static void Main(string[] args)
        {
            Random r = new Random();
            int a = r.Next(1, 11);  //  aに1から10の乱数を代入
            int b = r.Next(1, 11);  //  bに1から10の乱数を代入
            int c = r.Next(1, 11);  //  cに1から10の乱数を代入
            int result = Mul(a,b,c);  //  三つの数の積を求める
            Console.WriteLine("a = " + a);
            Console.WriteLine("b = " + b);
            Console.WriteLine("c = " + c);
            Console.WriteLine("a * b * c = {0}",result);
        }
 
    }
}