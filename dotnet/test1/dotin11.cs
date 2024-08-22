using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Dotin10;


namespace Dotin10
{
    
    class User {
        public  void SayHi(){
            Console.WriteLine("こんにちは");
        }
    }

    class MyApp
    {
        static void Main(string[] args)
        {
            User user = new User();
            user.SayHi();   
        }    
    }
}