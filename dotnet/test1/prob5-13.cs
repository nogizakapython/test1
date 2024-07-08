using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob512
{
    class prob512
    {
        
        public static void Main(string[] args){
            Random rnd = new Random();
            
            int[,] array1 = new int[3,3];
            
            
            for(int i=0;i<3;i++){
                for(int j=0;j<3;j++){
                    array1[i,j] = rnd.Next(1,10);
                    Console.Write("{0} ",array1[i,j]);
                }
                Console.WriteLine();
            }
            int max_value = 0;
            int min_value = 10;
            foreach(int number in array1){
                if (number < min_value){
                    min_value = number;
                }
                if (number > max_value){
                    max_value = number;
                }
            }
            Console.WriteLine("最大値は{0}です",max_value);
            Console.WriteLine("最小値は{0}です",min_value);
                  
            
        }
    }    
}