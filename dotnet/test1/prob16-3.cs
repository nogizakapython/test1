using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problemex7_3
{
    class Program
    {
        static void Main(string[] args)
        {
            int[] a = { 0 , 1, 2 };
            //  配列の内容を表示
            try
            {
                for(int i = 0; i < 4; i++){
                    Console.WriteLine("a[" + i +"]=" + a[i]);
                }
            } catch(IndexOutOfRangeException){
                Console.WriteLine("配列の範囲を超えています。");
            }    
        }
    }
}