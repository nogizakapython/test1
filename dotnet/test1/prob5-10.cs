using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prob510
{
    class prob510
    {
        static string initial(string msg){
            msg = "";
            return msg;


        }
        public static void Main(string[] args){
            Random rnd = new Random();
            int num = 7;
            int[] array1 = new int[num];
            for(int i=0;i<num;i++){
                array1[i] = rnd.Next(1,10);
                
            }
            string ans = "";
            
            
            
            foreach(int number in array1){
                for(int i=1;i<=number;i++){
                    ans = ans + "*";
                }
                Console.WriteLine(ans);
                ans = initial(ans);
            }
            
            
        }
    }    
}