using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem6_1
{
    class Program
    {
        static void Main(string[] args)
        {
            MinMax m = new MinMax();
            int a = 4,b = 2,c=7;
            Console.WriteLine("{0}と{1}と{2}のうち、最大のものは{2}",a,b,c,m.Max(a,b,c));
            Console.WriteLine("{0}と{1}と{2}のうち、最小のものは{2}",a,b,c,m.Min(a,b,c));
            
        }
    }
    //  最大値と最小値を求めるクラス
    class MinMax
    {
        //  最大値の取得
        public int Max(int n1, int n2,int n3)
        {
            int max_num = 0;
            if (n1 > n2){
                max_num = n1;
            } else {
                max_num = n2;
            }
            if (n3 > max_num){
                max_num = n3;
            }
            return max_num;
        }
        //  最大値の取得
        public int Min(int t1, int t2,int t3)
        {
            int min_num = 999;
            if (t1 < t2)
            {
                min_num = t1;
            } else {
                min_num = t2;
            }
            
            if (t3 < min_num){
                min_num = t3;
            }
            return min_num;
        }
    }
}