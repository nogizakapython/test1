using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx202
{
    class Program
    {
        //  staticなフィールド
        private static int snum = 100;
        //  インスタンスフィールド
        public int inum = 200;
        //  staticなメソッド
        public static void foo()
        {
            Console.WriteLine("fooメソッド（staticメソッド)");
        }
        public void bar()
        {
            Console.WriteLine("barメソッド（インスタンスメソッド）");
        }
        static void Main(string[] args)
        {
            //  インスタンスの生成
            Program p = new Program();
            Console.WriteLine("pのインスタンスフィールド:inum = {0}", p.inum);
            Console.WriteLine("Programのクラスフィールド:snum = {0}", snum);
            foo();
            p.bar();
        }
    }
}