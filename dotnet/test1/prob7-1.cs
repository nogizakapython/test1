using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem7_1
{
    class Data
    {
        //  メンバ変数number
        private int number = 0;
        //  メンバ変数comment
        private string comment = "";

        public void SetNumberComment(int number,string comment){
            this.number = number;
            this.comment = comment;

        }

        public void ShowNumberComment(){
            Console.WriteLine("number = {0}",number);
            Console.WriteLine("comment = {0}",comment);
        }

        public int Number {
            set { number = value;}
            get { return number;}
        }

        public string Comment {
            set { comment = value;}
            get { return comment;}
        }



    }

    class Program
    {
        static void Main(string[] args)
        {
            Data d = new Data();
            d.Number = 100;
            d.Comment = "Programming C#";
            Console.WriteLine("number = " + d.Number);
            Console.WriteLine("comment = " + d.Comment);
        }
    }
}