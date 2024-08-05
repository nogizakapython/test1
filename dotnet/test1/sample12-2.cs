using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Sample12_2
{
    //  スーパークラス
    class Super
    {
        //  パラメータ
        private int param = 0;
        //  コンストラクタ（引数なし）
        public Super()
        {
            Console.WriteLine("Superクラスのコンストラクタ(引数なし)");
        }
        //  コンストラクタ（引数あり）
        public Super(int param)
        {
            Console.WriteLine("Superクラスのコンストラクタ(引数:param={0})", param);
            this.param = param;
        }
        //  デストラクタ
        ~Super()
        {
            Console.WriteLine("Superクラスのデストラクタ");
        }
        public void showParam()
        {
            Console.WriteLine("param = {0}", param);
        }
    }
    class Sub : Super
    {
        //  Subクラスのコンストラクタ
        public Sub()
        {
            Console.WriteLine("Subのコンストラクタ(引数なし)");
        }
        //  Subクラスのコンストラクタ
        public Sub(int param) : base(param)
        {
            Console.WriteLine("Subのコンストラクタ（引数:param={0}）",param);
        }
        //  Subクラスのデストラクタ
        ~Sub()
        {
            Console.WriteLine("Subクラスのデストラクタ");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Sub s1 = new Sub();
            s1.showParam();
            Sub s2 = new Sub(100);
            s2.showParam();
        }
    }
}