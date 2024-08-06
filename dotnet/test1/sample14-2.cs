using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx502
{
    interface IFuncs1
    {
        void Func1();
        void Func2();
    }

    interface IFuncs2
    {
        void Func2();
        void Func3();
    }
    class Dummy : IFuncs1,IFuncs2
    {
        public void Func1()
        {
            Console.WriteLine("Func1");
        }
        public void Func2()
        {
            Console.WriteLine("Func2");
        }
        public void Func3()
        {
            Console.WriteLine("Func3");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Dummy d = new Dummy();
            IFuncs1 i1 = (IFuncs1)d;
            IFuncs2 i2 = (IFuncs2)d;
            //  i1のメソッドを利用
            i1.Func1();
            i1.Func2();
            //  i2のメソッドを利用
            i2.Func2();
            i2.Func3();
        }
    }
}