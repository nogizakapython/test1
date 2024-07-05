using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_10
{
    class prob4_10
    {
        static void Main(string[] args)
        {
            int max_value = 0;
            int min_value = 101;
            Random rnd = new Random();
            for(int i=0;i<5;i++){
                int num = rnd.Next(1,101);
                Console.WriteLine(num);
                if (num > max_value){
                    max_value = num;
                }
                if (num < min_value){
                    min_value = num;
                }
            }
            Console.WriteLine("最大値:{0}",max_value);
            Console.WriteLine("最小値:{0}",min_value);
                
                    
        }
    }
}
