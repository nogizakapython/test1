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
            string o50 = "";
            string u50 = "";
            foreach(int n in array1){
                if (n >= 50){
                    o50 = o50 + n.ToString() + " ";
                } else {
                    u50 = u50 + n.ToString() + " ";
                }    
            }
            Console.WriteLine("50以上の数は:{0}",o50);
            Console.WriteLine("50未満のは:{0}",u50);   
            
        }
    }
}