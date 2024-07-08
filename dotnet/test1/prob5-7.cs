using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob57
{
    class prob57
    {
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 5;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(1,10);
                Console.Write("{0} ",array1[i] );
            }
            Console.WriteLine();
            Console.WriteLine();
            int sum1 = array1.Sum();
            double avg = array1.Average();
            Console.WriteLine("配列の合計値は:{0}",sum1);
            Console.WriteLine("配列の平均値は:{0}",avg);
            string oavg = "";
            string uavg = "";
            foreach(int number in array1){
                if (number > avg){
                    oavg = oavg + Convert.ToString(number) + " ";
                } else if (number < avg) {
                    uavg = uavg + Convert.ToString(number) + " ";
                }
            }
            Console.WriteLine("平均より大きい数は:{0}",oavg);
            Console.WriteLine("平均より小さい数は:{0}",uavg); 
            
        }
    }    
}