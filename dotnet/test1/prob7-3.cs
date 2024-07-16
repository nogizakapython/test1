using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem7_3
{
    class Calculation
    {
        private int number1;
        private int number2;

        public int Number1
        {
            set{ number1 = value;}
            get{ return number1;}
        }
        public int Number2
        {
            set{ number2 = value;}
            get{ return number2;}
        }
        public void SetNumber(int number1,int number2)
        {
            this.number1 = number1;
            this.number2 = number2;
        }
        public int Add{
            set { number1 = this.number1;number2 = this.number2;}
            get {return number1 + number2;}
        }

        public int Sub{
            set { number1 = this.number1;number2 = this.number2;}
            get {return number1 - number2;}
        }

    }
    class Program
    {
        static void Main(string[] args)
        {
            Calculation c = new Calculation();
            c.Number1 = 8;    //  一つ目の数をセット
            c.Number2 = 9;    //  二つ目の数をセット
            c.SetNumber(c.Number1,c.Number2);
            //  二つの数の和を表示
            Console.WriteLine("{0} + {1} = {2}",c.Number1,c.Number2,c.Add);
            //  二つの数の差を表示
            Console.WriteLine("{0} - {1} = {2}",c.Number1,c.Number2,c.Sub);
        }
    }
}