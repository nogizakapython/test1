using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem6_3
{
    class Program
    {
        static void Main(string[] args)
        {
            Circle c = new Circle();
            //  円の半径を設定
            c.r = 4.0;
            Console.WriteLine("半径" + c.r +"の円の円周の長さは" + c.Circumference());
            Console.WriteLine("半径" + c.r +"の円の面積は" + c.Area());
        }
    }
    class Circle
    {
        //  半径
        public double r;
        //  円周の長さを求める
        public double Circumference()
        {
            return 2 * 3.14 * r;
        }
        public double Area(){
            return r * r * 3.14;
        }
    }
}