using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem2_2
{
    class Program
    {
        static void Main(string[] args)
        {
            
            Console.Write("文字列1を入力してください");
            string str1 = Console.ReadLine();
            Console.Write("文字列2を入力してください");
            string str2 = Console.ReadLine();

            Console.WriteLine("入力した文字列を結合すると:{0}です。",str1+str2);
            
        }
    }
}    