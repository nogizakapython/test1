using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob14_1
{
    interface IComputer
    {
        void BrowseWeb(); 
        void PlayGame();
        
    }
    interface IMailer
    {
        void SendMail();
        void RecieveMail();
    }

    interface IPhone
    {
        void CallPhone();
        void RecievePhone();
    }

    
    class CellPhone : IComputer,IMailer,IPhone
    {
        //  メールを送信する
        public void SendMail(){
            Console.WriteLine("メールを送る");
        }
        //  メールを受信する
        public void RecieveMail(){
            Console.WriteLine("メールを受信する");
        }
        //  webを閲覧する
        public void BrowseWeb()
        {
            Console.WriteLine("ウェブを閲覧する");
        }
        //  ゲームをする
        public void PlayGame(){
            Console.WriteLine("ゲームをする");
        }
        //  電話をかける
        public void CallPhone(){
            Console.WriteLine("電話を掛ける");
        }
        //  電話を受ける
        public void RecievePhone(){
            Console.WriteLine("電話を受ける");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            CellPhone cp = new CellPhone();
            FuncPhone(cp);
            FuncMailer(cp);
            FuncComputer(cp);
        }
        //  電話としての処理
        public static void FuncPhone(IPhone phone)
        {
            phone.CallPhone();      //  電話を掛ける
            phone.RecievePhone();   //  電話を受ける
        }
        //  メーラーとしての処理
        public static void FuncMailer(IMailer mailer)
        {
            mailer.SendMail();      //  メールを送信する
            mailer.RecieveMail();   //  メールを受信する
        }
        //  コンピュータとしての処理
        public static void FuncComputer(IComputer computer)
        {
            computer.PlayGame();    //  ゲームをする
            computer.BrowseWeb();   //  ウェブを閲覧する
        }
    }
}