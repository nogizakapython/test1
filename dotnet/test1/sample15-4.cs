using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx604
{
    class Program
    {
        static void Main(string[] args)
        {
            //  ハッシュセットの生成
            HashSet<int> t = new HashSet<int>();
            //  データの追加
            t.Add(1);
            t.Add(2);
            t.Add(3);
            t.Add(1);
            //  データの出力
            foreach (int i in t)
            {
                Console.WriteLine("{0}", i);
            }
        }
    }
}