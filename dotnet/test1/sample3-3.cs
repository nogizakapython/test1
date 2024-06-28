using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Sample303
{
    class Program
    {
        static void Main(string[] args)
        {
            //  キーボードから数値を入力
            Console.Write("1から3の整数を入力:");
            int num = int.Parse(Console.ReadLine());
            if(num == 1){
                Console.WriteLine("one");    //  numが1だった場合の処理
            }else if(num == 2){
                Console.WriteLine("two");    //  numが2だった場合の処理
            }else if(num == 3){
                Console.WriteLine("three");  //  numが3だった場合の処理
            }else{
                Console.WriteLine("不適切な値です。"); //  それ以外の値が入力された場合の処理
            }
        }
    }
}