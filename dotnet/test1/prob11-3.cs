using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob11_3
{
    class Program
    {
        static void Square(int h, int w)
        {   
            string ans;
            for(int i=1;i<=h;i++){
                ans = "";
                for(int j=1;j<=w;j++){
                    if(j == w){
                        ans += "■"; 
                    } else {
                        ans += "■ ";
                    }
                }
                Console.WriteLine(ans);
            }
        }
        static void Square()
        {
            Console.WriteLine();
        }
        static void Main(string[] args)
        {
            Random r = new Random();
            int height = r.Next(0,11);
            int width = r.Next(0,11);
            Console.WriteLine("たて = {0}" ,height);
            Console.WriteLine("よこ = {0}",width);
            if((width == 0) || (height == 0))
            {
                Square();
            } else if ((width > 0) && (height > 0))
            {
                Square(height,width);
            }
            
            
        }
 
    }
}