using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample602
{
    class Calc
    {
        //  二つの整数の引数の和を求める
        public int Add(int a,int b){
            return a + b;
        }
        //  三つの整数の引数の和を求める
        public int Add(int a, int b, int c)
        {
            return a + b + c;
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Calc calc = new Calc();
            int a = 1,b = 2,c = 3;
            int ans1 = calc.Add(a, b);
            int ans2 = calc.Add(a, b, c);
            Console.WriteLine("{0} + {1} = {2}", a, b, ans1);
            Console.WriteLine("{0} + {1} + {2} = {3}", a, b, c, ans2);
        }
    }
}