using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob53
{
    class prob53
    {
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 10;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(1,101);
                Console.Write("{0} ",array1[i] );
            }
            Console.WriteLine();
            Console.WriteLine();
            string guusu = "";
            string kisuu = "";
            foreach(int n in array1){
                if (n % 2 == 0){
                    guusu = guusu + n + " ";
                } else {
                    kisuu = kisuu + n + " ";
                }    
            }
            Console.WriteLine("偶数は:{0}",guusu);
            Console.WriteLine("奇数は:{0}",kisuu);   
            
        }
    }
}