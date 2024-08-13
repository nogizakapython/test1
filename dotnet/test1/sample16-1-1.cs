using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SampleEx701
{
    //  デリゲート
    // delegate void Operation(int a,int b);
    //  Calcクラス
    class Calc
    {
        public void Sub(int a, int b)
        {
            Console.WriteLine("{0} - {1} = {2}", a, b, a - b);
        }

        public void Add(int a, int b)
        {
            Console.WriteLine("{0} + {1} = {2}", a, b, a + b);
        }
    }
    
    //  Programクラス
    class Program
    {
        
        static void Main(string[] args)
        {
            Calc c = new Calc();
            //  デリゲートの設定
            c.Add(2,1);
            c.Sub(2,1);
            //  デリゲートで設定したメソッドの呼び出し
        }
    }
}