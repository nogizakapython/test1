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
            // 奇数リスト
            List<int> odd = new List<int>();
            // 偶数リスト
            List<int> even = new List<int>();
            // 乱数オブジェクトを呼び出す
            Random rnd = new Random();
            int r_num;
            //  偶数表示
            string odd_ans = "奇数：";
            int odd_count = 0;
            // 奇数表示
            string even_ans = "偶数：";
            int even_count = 0;
            while(true)
            {
                r_num = rnd.Next(0,10);
                if(r_num == 0){
                    break;
                } else if (r_num % 2 == 1){
                    odd.Add(r_num);
                } else {
                    even.Add(r_num);
                }
            } 
            odd_count = odd.Count();
            even_count = even.Count();
            
            for(int i=0;i<odd_count;i++){
                string data = odd[i].ToString();
                if (i == odd_count - 1){
                    odd_ans = odd_ans + data;    
                } else {
                    odd_ans = odd_ans + data + " ";
                }    
            } 
            Console.WriteLine(odd_ans);  
            
            for(int j=0;j<even_count;j++){
                string data1 = even[j].ToString();
                if ( j == even_count - 1){
                    even_ans = even_ans + data1;
                } else {    
                    even_ans = even_ans + data1 + " ";
                }    
            } 
            Console.WriteLine(even_ans);
        }
    }
}