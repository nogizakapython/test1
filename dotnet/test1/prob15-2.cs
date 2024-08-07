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
            // 乱数結果リスト
            List<int> numlist = new List<int>();
            
            // 乱数オブジェクトを呼び出す
            Random rnd = new Random();
            int r_num;
            //  結果表示
            string ans = "結果：";
            int list_count = 0;
            
            while(true)
            {
                r_num = rnd.Next(0,10);
                if(r_num == 0){
                    break;
                } else {
                    numlist.Add(r_num);
                } 
            } 
            list_count = numlist.Count();
            numlist.Reverse();

            for(int i=0;i<list_count;i++){
                string data = numlist[i].ToString();
                if (i == list_count - 1){
                    ans = ans + data;    
                } else {
                    ans = ans + data + " ";
                }    
            }
            Console.WriteLine(ans); 
            
        }
    }
}