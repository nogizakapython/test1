using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob51
{
    class prob51
    {
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 7;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(1,10);
                Console.Write("array1[{0}]={1} ,",i,array1[i] );
                
            }
            Console.WriteLine();
        }
    }
}