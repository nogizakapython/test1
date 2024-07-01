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
            Console.Write("季節を入力(1:春,2:夏,3:秋,4:冬) ");
            int num = int.Parse(Console.ReadLine());
            switch(num){
                case 1:
                    Console.WriteLine("春です");
                    break;
                case 2:
                    Console.WriteLine("夏です");
                    break;
                case 3:
                    Console.WriteLine("秋です");
                    break;
                case 4:
                    Console.WriteLine("冬です");
                    break;
                default:
                    Console.WriteLine("エラーです");
                    break;           
            }
        }
    }
}