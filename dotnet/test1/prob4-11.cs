using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_11
{
    class prob4_11
    {
        static void Main(string[] args)
        {
            int add_count = 0;
            int minus_count = 0;
            Random rnd = new Random();
            for(int i=0;i<5;i++){
                int num = rnd.Next(1,101);
                Console.WriteLine(num);
                if (num % 2 == 0){
                    add_count += 1;
                } else {
                    minus_count += 1;
                }
                
            }
            Console.WriteLine("偶数の数:{0}",add_count);
            Console.WriteLine("奇数の数:{0}",minus_count);
                
                    
        }
    }
}
