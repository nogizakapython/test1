using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob10_1
{
    class Sample
    {   
        private string str1  = "";
        public Sample() : this("コンストラクタ")
        {

        }
        
         
        public Sample(string msg)
        {
           this.str1 = msg;
           Console.WriteLine(this.str1);
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Sample s1 = new Sample();
            Sample s2 = new Sample("foo");
        }
    }
}