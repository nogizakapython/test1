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
            Random rnd = new Random();
            int num = rnd.Next(1,1000);
            string numstr = num.ToString();
            int strlength = numstr.Length;
            Console.WriteLine(strlength);
            Console.WriteLine(numstr);
        }
    }
}