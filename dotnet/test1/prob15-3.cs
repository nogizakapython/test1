using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Prob15_1
{
    class Program
    {
        static void Main(string[] args)
        {
            // 乱数結果リスト
            Dictionary<string,string> animallist = new Dictionary<string, string>();
            
            animallist["cat"] = "猫"; 
            animallist["dog"] = "犬";
            animallist["bird"] = "鳥";
            animallist["tiger"] = "虎";
            animallist["rabbit"] = "うさぎ";

            Console.Write("英語で動物の名前を入力してください：");
            
            try {
                string str = Console.ReadLine();
                Console.WriteLine("「" + animallist[str] + "」です"); 
            } catch (KeyNotFoundException){
                Console.WriteLine("登録されていません");
            }         
             
        }
    }
}