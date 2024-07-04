using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_8
{
    class prob4_8
    {
        static void Main(string[] args)
        {
            Random rnd = new Random();
            
            
            // 無限ループ
            while(true){
                int num = rnd.Next(1,101);
                Console.WriteLine(num);
                if (num % 10 == 0){
                    Console.WriteLine("終了します");
                    break;
                } 
                    
                
            }    
                    
        }
    }
}
