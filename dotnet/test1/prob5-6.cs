using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob56
{
    class prob56
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
            
            Console.WriteLine("配列の最大値は:{0}",array1.Max());
            Console.WriteLine("配列の最小値は:{0}",array1.Min());
            Console.WriteLine("配列の合計値は:{0}",array1.Sum());
            Console.WriteLine("配列の平均値は:{0}",array1.Average()); 
            
        }
    }    
}