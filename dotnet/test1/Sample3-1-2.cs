using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Sample312
{
    class Program
    {
        static void Main(string[] args)
        {
            Random rnd = new Random();
            int r_num = rnd.Next(0,50);
            int num = r_num % 7;
            
            switch(num){
                case 0:
                    Console.WriteLine("大吉");
                    break;
                case 1:
                    Console.WriteLine("中吉");
                    break;
                case 2:
                    Console.WriteLine("吉");
                    break;
                case 3:
                    Console.WriteLine("小吉");
                    break;  
                case 4:
                    Console.WriteLine("末吉");
                    break;
                case 5:
                    Console.WriteLine("菅原小吉");
                    break;
                case 6:
                    Console.WriteLine("凶");
                    break;
                    

            }
            
        }
    }
}