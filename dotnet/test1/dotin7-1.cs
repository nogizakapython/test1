using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin7_1
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
            User[] userA = new User[2];
            for(int i=0;i<2;i++){
                userA[i] = new User();
                
            } 
            User.GetCount();    
        }    
    }
}