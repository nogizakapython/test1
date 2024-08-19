using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin8_1
{
    abstract class User {
        public abstract void SayHi();
    }
    class Japanese: User {
        private string name;
        public Japanese(){
            this.name = "ななし";
        }
        public Japanese(string name1){
            this.name = name1;
        }
        
        public override void SayHi(){
            Console.WriteLine("{0}さん、こんにちは",this.name);
        }
    }

    class American: User {
        private string name;
        public American(){
            this.name = "nobody";
        }
        public American(string name2){
            this.name = name2;
        }

        public override void SayHi(){
            Console.WriteLine("Hi!{0}!",this.name);
        }
    }

    class MyApp
    {
        static void Main(string[] args)
        {
            Japanese aki = new Japanese();
            American tom = new American();
            Japanese sayaka = new Japanese("掛橋沙耶香");
            American erick = new American("エリック");
            aki.SayHi();
            tom.SayHi();
            sayaka.SayHi();
            erick.SayHi();    
        }    
    }
}