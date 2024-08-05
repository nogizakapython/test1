using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx303
{
    //  親クラス
    class Parent
    {
        public void Foo()
        {
            Console.WriteLine("親クラスのFoo()メソッド");
        }
    }
    //  子クラス
    class Child : Parent
    {
        public void Foo()
        {
            Console.WriteLine("子クラスのFoo()メソッド");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            //  Parentクラスのインスタンス生成
            Parent p = new Parent();
            //  Childクラスのインスタンス生成
            Parent c = new Child();
            //  それぞれのクラスのfoo、barメソッドを実行
            p.Foo();
            c.Foo();
        }
    }
}