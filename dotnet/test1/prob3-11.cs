using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem3_11
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("1から100までの数値を入力してください ");
            // const string MSG = "abc";
            int num1 = int.Parse(Console.ReadLine());
            if (num1 >= 20 && num1 < 80){
                Console.WriteLine("20以上80未満です");
            } else if (num1 < 0 || num1 > 100) {
                Console.WriteLine("範囲外");
            } else {
                Console.WriteLine("20未満か、80以上です");
            }
        }
    }
}