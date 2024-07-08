using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Sample503
{
    class Program{
        static void Main(string[] args){
            int[] n = {5,4,3,2,1};
            string[] s = {"ABC","DEF","G"};
            
            for(int i=0;i < n.Length;i++){
                Console.Write(n[i] + " ");
                
            }
            Console.WriteLine();
            
            for(int j=0;j < s.Length;j++){
                Console.Write(s[j] + " ");
            }

            Console.WriteLine();

        }
    }
}