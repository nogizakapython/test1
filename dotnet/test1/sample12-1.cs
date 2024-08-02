using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx301
{
    class Calculator
    {
        //  一つ目の数値
        protected int num1;
        //  二つ目の数値
        protected int num2;
        //  num1のプロパティ
        public int Num1
        {
            set { num1 = value; }
            get { return num1; }
        }
        //  num2のプロパティ
        public int Num2
        {
            set { num2 = value; }
            get { return num2; }
        }
        //  足し算
        public void add()
        {
            Console.WriteLine("{0} + {1} = {2}",num1,num2,num1 + num2);
        }
        //  引き算
        public void sub()
        {
            Console.WriteLine("{0} - {1} = {2}", num1, num2, num1 - num2);
        }
    }
    class ExCalculator : Calculator
    {
        //  掛け算
        public void mul()
        {
            Console.WriteLine("{0} * {1} = {2}", num1, num2, num1 * num2);
        }
        //  割り算
        public void div()
        {
            Console.WriteLine("{0} / {1} = {2}", num1, num2, num1 / num2);
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            //  Calculatorクラスのインスタンス
            Calculator c1 = new Calculator();
            c1.Num1 = 10;
            c1.Num2 = 3;
            //  足し算・引き算の結果を表示
            c1.add();
            c1.sub();
            ExCalculator c2 = new ExCalculator();
            c2.Num1 = 10;
            c2.Num2 = 3;
            //  足し算・引き算の結果を表示
            c2.add();
            c2.sub();
            //  掛け算・割り算の結果を表示
            c2.mul();
            c2.div();
        }
    }
}