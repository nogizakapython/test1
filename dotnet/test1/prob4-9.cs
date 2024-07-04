using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_9
{
    class prob4_9
    {
        static void Main(string[] args)
        {
            Random rnd = new Random();
            for(int i=0;i<5;i++){
                int num = rnd.Next(1,101);
                Console.WriteLine(num);
            }
                
                    
        }
    }
}
