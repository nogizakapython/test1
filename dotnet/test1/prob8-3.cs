using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem6_3
{
    class Program
    {
        static void Main(string[] args)
        {
            int num;
            int ans = 1;
            while(true){

                try
                {
                    Console.WriteLine("1以上の整数を入力してください");
                    num = int.Parse(Console.ReadLine());
                    if(num < 1) {
                        Console.WriteLine("1以上の整数を入力してください");
                    } else {
                        break;
                    }
                }    
                catch( Exception e)
                {
                    Console.WriteLine("文字列を入力しないでください");  
                    Console.WriteLine(e);
                }
            }
            for(int i=num;i>=1;i--){
                ans = ans * i;
            }
            Console.WriteLine(ans);

        }
    }
}