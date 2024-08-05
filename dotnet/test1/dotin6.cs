using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin6
{
    class Show1
    {
        private string name = "";
        private int height = 0;

        public Show1(string name,int height){
            this.name = name;
            this.height = height;
        }

        public Show1(){

        }

        public string Name{
            set { name = value;}
            get{ return name;}
        }

        public int Height{
            set{height = value;}
            get{ return height;}
        }


        public void data1(string name,int height){
            this.name = name;
            this.height = height;
        }
        public void showdata(){
            Console.WriteLine("{0}さんの身長は{1}cmです。",name,height);
        }
    }
    class dotin6
    {
        static void Main(string[] args)
        {
            Console.WriteLine("test1\ntest2");
            var str1 = "白石麻衣";
            var str2 = 31;
            Console.WriteLine("{0}は{1}才です",str1,str2);
            Show1 s1 = new Show1();
            s1.data1("秋元真夏",154);
            s1.showdata();
            Show1 s2 = new Show1();
            s2.Name = "鈴木絢音";
            s2.Height = 162;
            s2.showdata();
            Show1 s3 = new Show1("林瑠奈",164);
            s3.showdata();
        }    
    }
}