using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob55
{
    class prob55
    {
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 10;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(1,10);
                Console.Write("{0} ",array1[i] );
            }
            Console.WriteLine();
            Console.WriteLine();
            string t3 = "";
            string n3 = "";
            foreach(int n in array1){
                if (n % 3 == 0){
                    t3 = t3 + n.ToString() + " ";
                } else {
                    n3 = n3 + n.ToString() + " ";
                }    
            }
            Console.WriteLine("3の倍数は:{0}",t3);
            Console.WriteLine("3の倍数でないのは:{0}",n3);   
            
        }
    }
}