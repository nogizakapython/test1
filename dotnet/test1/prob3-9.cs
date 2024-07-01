using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem3_8
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("文字列を入力: ");
            const string MSG = "abc";
            string str1 = Console.ReadLine();
            if (str1 == "abc"){
                Console.WriteLine("{0}です。",MSG);
            } else {
                Console.WriteLine("{0}ではありません。",MSG);
            }
        }
    }
}