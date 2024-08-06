using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample13_3
{
    //  スーパークラス（抽象プロパティ持つ）
    abstract class VectorBase
    {
        //  抽象プロパティ
        public abstract double X
        {
            set;
            get;
        }
        public abstract double Y
        {
            set;
            get;
        }
    }

    class Vector : VectorBase
    {
        private double x = 0.0;
        private double y = 0.0;
        //  プロパティの実装
        public override double X
        {
            set { x = value;}
            get { return x; }
        }
        public override double Y
        {
            set { y = value; }
            get { return y; }
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Vector v = new Vector();
            v.X = 0.1;
            v.Y = 0.2;
            Console.WriteLine("v=({0},{1})", v.X, v.Y);
        }
    }
}