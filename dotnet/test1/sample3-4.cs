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
            Console.Write("1から100の整数を1つずつチェックし、FizzBuzz表示する");
            for(int i=1;i<=100;i++){
                if (i % 3 == 0 && i % 5 == 0){
                    Console.WriteLine("FizzBuzz");
                } else if (i % 3 == 0){
                    Console.WriteLine("Fizz");
                } else if ( i % 5 == 0){
                    Console.WriteLine("Buzz");
                } else {
                    Console.WriteLine(i);
                }
            }
        }
    }
}