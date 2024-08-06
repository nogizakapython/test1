using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample13_2
{
    
    abstract class Bird
    {
        //  名前フィールド
        private String name;
        //  引数つきコンストラクタ
        public Bird(String name)
        {
            this.name = name;
        }
        // 名前を取得
        public String Name
        {
            get { return name; }
        }
        //  鳴く（抽象メソッド）
        public abstract void Sing();
    }

    class Crow : Bird
    {
        public Crow() : base("カラス")
        {
        }
        //  カラスがなく
        public override void Sing()
        {
            Console.WriteLine("カーカー");
        }
    }

    class Sparrow : Bird
    {
        //  コンストラクタ
        public Sparrow() : base("すずめ")
        {
        }
        //  すずめがなく
        public override void Sing()
        {
            Console.WriteLine("チュンチュン");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Bird[] b = new Bird[2];     //  Birdクラスの変数の配列を生成
            b[0] = new Crow();         //  b[0]に、Crow2クラスのインスタンスを生成
            b[1] = new Sparrow();      //  b[1]に、Sparrow2クラスのインスタンスを生成
            for(int i = 0; i < b.Length ; i++){
                Console.Write(b[i].Name+" : ");
                b[i].Sing();
            }
        }
    }
}