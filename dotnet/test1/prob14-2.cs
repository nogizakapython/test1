using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob14_2
{
    interface IAlarm
    {
        void Alarm();
        void SetAlarm();
        void StopAlarm();
    }

    interface IClock
    {
        void ShowTime();
        void AdjustTime();
    }

    class AlarmClock: IAlarm,IClock
    {
        public void Alarm(){
            Console.WriteLine("アラームを鳴らす");
        }
        public void SetAlarm(){
            Console.WriteLine("アラームをセットする");
        }
        public void StopAlarm(){
            Console.WriteLine("アラームを止める");
        }
        public void ShowTime(){
            Console.WriteLine("時刻を知る");
        }
        public void AdjustTime(){
            Console.WriteLine("時刻を修正する");
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            AlarmClock ac = new AlarmClock();   //  アラーム付き時計クラスのインスタンスを生成
            IAlarm ar = (IAlarm)ac;
            IClock cl = (IClock)ac;
            FuncAlarm(ar);
            FuncClock(cl);
        }
        //  アラームとしての処理
        public static void FuncAlarm(IAlarm alarm)
        {
            alarm.SetAlarm();   //  アラームのセット
            alarm.Alarm();      //  アラームを鳴らす
            alarm.StopAlarm();  //  アラームを止める
        }
        //  時計としての処理
        public static void FuncClock(IClock clock)
        {
            clock.AdjustTime(); //  時間を調整する
            clock.ShowTime();   //  時間を表示する
        }
    }
}