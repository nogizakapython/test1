using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx401
{
    class Crow
    {
        private String name = "カラス";
        //  カラスがなく
        public void Sing(){
            Console.WriteLine("カーカー");
        }
        // 名前を取得
        public String Name{
            get{ return name; }
        }
    }
    class Sparrow
    {
        private String name = "すずめ";
        //  カラスがなく
        public void Sing(){
            Console.WriteLine("チュンチュン");
        }
        // 名前を取得
        public String Name{
            get{ return name; }
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Crow c = new Crow();          //  カラスクラス
            Sparrow s = new Sparrow();    //  すずめクラス
            //  カラスがなく
            Console.Write(c.Name+" : ");
            c.Sing();
            //  雀がなく
            Console.Write(s.Name + " : ");
            s.Sing();
        }
    }
}