using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample406
{
    class Program
    {
        static void Main(string[] args)
        {
            
            int num;
            Console.WriteLine("正の整数を入力してください");
            while(true){
                num = int.Parse(Console.ReadLine());
                if(num < 1){
                    Console.WriteLine("正の整数を入力してね");
                } else {
                    break;
                }
            }
            int i = 1;
            while(i<=num){
                if(i==1){
                    Console.Write("■");
                } else {
                    Console.Write(" ■");
                }
                i++;    
            }
            Console.WriteLine();

            
            
        }
    }
}
