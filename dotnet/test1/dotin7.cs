using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin8
{
    class User
    {
        private static int count = 0;
        public User(){
            User.count++;
        }
        public static void GetCount(){
            Console.WriteLine("# of instances:{0}",count);
        }
    }
    class MyApp
    {
        static void Main(string[] args)
        {
            User.GetCount();
            User user1 = new User();
            User user2 = new User();
            User user3 = new User();
            User user4 = new User();
            User.GetCount();    
        }    
    }
}