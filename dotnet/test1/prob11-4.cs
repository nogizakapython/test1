using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob11_4
{
    class Counter
    {
        //  カウント
        private int count = 0;
        private static int totalcount = 0;
        //  コンストラクタ
        public void Reset()
        {
            count = 0;
        }
        //  カウントのインクリメント
        public void Increment()
        {
            count++;
        }
        //  回数のプロパティ
        public int Count
        {
            get
            {
                return count;
            }
        }
        public static int ToTalCount(int a,int b)
        {
            totalcount = a + b;
            return totalcount;
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Counter c1,c2;
            c1 = new Counter();
            c2 = new Counter();
            c1.Increment();
            c2.Increment();
            c2.Increment();
            c2.Reset();
            c2.Increment();
            c1.Reset();
            c1.Increment();
            c1.Increment();
            c2.Increment();
            Console.WriteLine("c1のカウント数：" + c1.Count);
            Console.WriteLine("c2のカウント数：" + c2.Count);
            int ToTalCount = Counter.ToTalCount(c1.Count,c2.Count);
            Console.WriteLine("トータルのカウント数:{0}",ToTalCount);
        }
    }
}