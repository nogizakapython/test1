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
            for(int i=1;i<=num;i++){
                if(i==1){
                    Console.Write("■");
                } else {
                    Console.Write(" ■");
                }    
            }
            Console.WriteLine();

            
            
        }
    }
}
