using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample201
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("{0} + {1} + {2} = {3}",1,2,3,1+2+3);  //  足し算
            Console.WriteLine("{0} - {1} - {2} = {3}", 3,2,1,3-2-1);  //  引き算
            Console.WriteLine("{0} * {1} * {2} = {3}", 2,3,-2,2*3*(-2));  //  掛け算
            Console.WriteLine("({0} + {1}) / {2} = {3} 余り {4}", 1, 5, 3,(1+5)/3, (1+5)%3);//  割り算と剰余
        }
    }
}