using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob15_1
{
    class Program
    {
        static void Main(string[] args)
        {
            // 乱数リスト
            List<int> numlist = new List<int>();
            // 出現した数リスト
            HashSet<int> anslist = new HashSet<int>();
            
            
            // 乱数オブジェクトを呼び出す
            Random rnd = new Random();
            int r_num;
            // 乱数表示
            string random_ans = "乱数:";
            //  結果表示
            string ans = "結果：";
            int ans_count = 0;
            
            for(int i=0;i<10;i++){
                r_num = rnd.Next(1,10);
                numlist.Add(r_num);    
            }
            for(int j=0;j<10;j++){
                string data1 = numlist[j].ToString();
                if (j == 9){
                    random_ans = random_ans + data1;
                } else {
                    random_ans = random_ans + data1 + " ";
                }
                anslist.Add(numlist[j]);    
            }
            Console.WriteLine(random_ans); 
            ans_count = anslist.Count();
            foreach(int n in anslist){
                Console.Write(n);
                Console.Write(" ");
            }

        }
    }
}