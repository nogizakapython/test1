using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx601
{
    class Program
    {
        static void Main(string[] args)
        {
            List<int> a = new List<int>();
            //  値を順に挿入
            a.Add(3);
            a.Add(2);
            a.Add(1);
            //  1番目に4を挿入
            a.Insert(1, 4);
            foreach(int i in a){
                Console.WriteLine("{0}", i);
            }
        }
    }
}