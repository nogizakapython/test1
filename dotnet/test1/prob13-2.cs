using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problemex4_2
{
    public abstract class PlaneFigure
    {
        //  面積
        protected double area;
        //  幅
        protected double width = 0;
        //  高さ
        protected double height = 0;
        public PlaneFigure()
        {

        }
        public PlaneFigure(double width,double height)
        {
            this.width = width;
            this.height = height;
        }
        public double Width
        {
            get { return width;}
        }
        public double Height
        {
            // set { height = value;}
            get { return height;}
        }    
        public abstract void Area();

    }
    class Box : PlaneFigure
    {
        public Box()
        {

        }
        
        //  コンストラクタ（引数あり）
        public Box(double width, double height)
        {
            this.width = width;
            this.height = height;
        }
        //  幅のプロパティ
        public double Width
        {
            get { return width; }
        
        }
        //  高さのプロパティ
        public double Height
        {
            get { return height; }
        
        }
        //  面積の取得
        public override void Area(){
             area = this.width * this.height;
             Console.WriteLine("底辺{0},高さ{1}の四角形の面積は{2}です。", this.width, this.height,area); 
        }
        
    }
    class Triangle : PlaneFigure
    {
        public Triangle()
        {

        }
        //  コンストラクタ（引数あり）
        public Triangle(double width, double height)
        {
            this.width = width;
            this.height = height;
        }
        //  幅のプロパティ
        public double Width
        {
            get { return width; }
            // set { width = value; }
        }
        //  高さのプロパティ
        public double Height
        {
            get { return height; }
            // set { height = value; }
        }
        //  面積の取得
        public override void Area()
        {
            area = (this.width * this.height) / 2;
             Console.WriteLine("底辺{0},高さ{1}の三角形の面積は{2}です。", width, height,area); 
        }

    }
    class Program
    {
        static void Main(string[] args)
        {
            //  四角形の生成
            Box b = new Box(2.0,4.0);
            //  三角形の生成
            Triangle t = new Triangle(4.0, 1.5);
            b.Area();
            t.Area();
            
        }
    }
}