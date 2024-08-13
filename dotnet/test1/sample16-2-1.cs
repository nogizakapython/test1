using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace sample16_2_1
{
    class Program
    {
        //  デリゲートの宣言
        delegate void Action(int a);
        //  1つ目の処理
        static void Func1(int a)
        {
            Console.WriteLine("a={0}",Math.Pow(a,1));
        }
        //  2つ目の処理
        static void Func2(int a)
        {
            Console.WriteLine("a*2={0}", Math.Pow(a,2));
        }
        //  3つ目の処理
        static void Func3(int a)
        {
            Console.WriteLine("a*3={0}", Math.Pow(a,3));
        }
        static void Main(string[] args)
        {
            //  デリゲートaの作成
            Action a = new Action(Func1);
            //  処理の追加
            a += new Action(Func2);
            a += new Action(Func3);
            //  処理の実行
            a(2);
        }
    }
}