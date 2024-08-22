using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin9
{
    interface IShareble {
        void Share();
    }
    class User: IShareble {
        public  void Share(){
            Console.WriteLine("now sharing");
        }
    }

    class MyApp
    {
        static void Main(string[] args)
        {
            User user = new User();
            user.Share();   
        }    
    }
}