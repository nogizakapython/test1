using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob59
{
    class prob59
    {
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 10;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(0,100);
                Console.Write("{0} ",array1[i] );
            }
            Console.WriteLine();
            string o50 = "";
            string u50 = "";
            int zero_count = 0;
            
            foreach(int number in array1){
                if (number >= 50){
                    o50 = o50 + Convert.ToString(number) + " ";
                } else if (number < 50) {
                    u50 = u50 + Convert.ToString(number) + " ";
                }
                if (number % 10 == 0){
                    zero_count += 1;
                }
            }
            Console.WriteLine("50以上の数は:{0}",o50);
            Console.WriteLine("50未満の数は:{0}",u50); 
            Console.WriteLine("0の個数は{0}個",zero_count);
            
        }
    }    
}