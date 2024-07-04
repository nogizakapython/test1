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
            Random rnd = new Random();
            
            
            // 無限ループ
            while(true){
                Console.WriteLine("0以上の数値を入力してください");
                int num = int.Parse(Console.ReadLine());
                if (num < 0){
                    Console.WriteLine("終了します");
                    break;
                } 
            }    
                    
        }
    }
}
