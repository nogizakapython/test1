using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problemex1_2
{
    class Calc
    {
        //  一つ目の数
        private int num1;
        //  二つ目の数
        private int num2;
        //  

        public Calc() : this(0,0)
        {

        }
        public Calc(int num1,int num2)
        {
            this.num1 = num1;
            this.num2 = num2;
        }
        
        public void ShowAdd()
        {
            Console.WriteLine("{0} + {1} = {2}", this.num1, this.num2, this.num1 + this.num2);
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Calc c1 = new Calc(1,2);
            Calc c2 = new Calc(3,1);
            Calc c3 = new Calc();
            //  加算の結果を表示
            c1.ShowAdd();
            c2.ShowAdd();
            c3.ShowAdd();
        }
    }
}