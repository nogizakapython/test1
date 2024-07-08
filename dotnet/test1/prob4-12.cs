using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_12
{
    class prob4_12
    {
        static void Main(string[] args)
        {
            int add_count = 0;
            int minus_count = 0;
            Random rnd = new Random();
            int num = rnd.Next(1,11);
            if (num < 5){
                for(int i=1;i<=num;i++){
                    if (i < num){
                        Console.Write("☆ ");
                    } else {
                        Console.Write("☆");
                    }    
                }
            } else {
                for(int i=1;i<=num;i++){
                    if (i < num){
                        Console.Write("★ ");
                    } else {
                        Console.Write("★");
                    }    
                }
            }
                
                    
        }
    }
}
