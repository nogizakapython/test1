using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Sample601
{
    class Person{
        // 名前の情報
        public string name = "";
        // 年齢の情報
        public int age = 0;
        
        // 情報の表示(メソッド)
        public void ShowAgeAndName(){
            Console.WriteLine("名前:{0}、年齢{1}",this.name,this.age);
        }
        // 情報の設定
        public void SetAgeAndName(string name,int age){
            this.name = name;
            this.age = age;
        }
        

    }

 
    class Program{
    
        static void Main(string[] args)
        {
            
            Person p1 = new Person();  //  一つ目のPersonクラスのメソッドのインスタンスを生成
            Person p2 = new Person();  //  二つ目のPersonクラスのメソッドのインスタンスを生成
            p1.name = "山下美月";   //  フィールドnameに値を代入
            p1.age = 24;            //  フィールドageに値を代入
            p2.SetAgeAndName("大園玲", 22);   //  setAgeAndName()メソッドで、nameとageを設定
            //  showAgeAndName()メソッドで、それぞれのインスタンスのnameとageを表示
            p1.ShowAgeAndName();
            p2.ShowAgeAndName();
        }
    }    
    
}    
