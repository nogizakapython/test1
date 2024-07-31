using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx103
{
    class Dummy
    {
        //  コンストラクタ
        public Dummy()
        {
            Console.WriteLine("コンストラクタ");
        }
        //  デストラクタ
        ~Dummy()
        {
            Console.WriteLine("デストラクタ");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Dummy d = new Dummy();
        }
    }
}