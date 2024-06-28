using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App02
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("数値を入力してください。");

            string input = Console.ReadLine();
            int inputNum = Convert.ToInt32(input);

            Console.WriteLine();

            Console.Write("入力値：");
            Console.WriteLine(inputNum.ToString());

            Console.ReadLine();
        }
    }
}