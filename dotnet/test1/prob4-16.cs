using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace prob4_16
{
    class prob4_16
    {
        static void Main(string[] args)
        {
            int start_num = 1;
            int end_num = 9;
            for(int i=start_num;i<=end_num;i++){
                for(int j=start_num;j<=end_num;j++){
                    if (i >= j){
                        Console.Write("■ ");
                    } else if (j == end_num){
                        Console.Write("□");
                        Console.WriteLine();
                    } else {
                        Console.Write("□ ");
                    }
                    
                }
                
                
            }
                
                    
        }
    }
}
