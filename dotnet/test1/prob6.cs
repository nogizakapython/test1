using System;
// ファイルの読み書きのためのライブラリを呼び出す
using System.IO;
using System.Text;

namespace Sample
{
    class Sample
    {
        static void Main()
        {   
            // ファイル名を定義
            string file_name = "member.txt";
            // StreamReaderクラスを読み込むファイル名とエンコードを指定してインスタンス化する
            StreamReader sr = new StreamReader(file_name, Encoding.GetEncoding("utf-8"));

            Console.WriteLine("レスポンスなうに回答する人数を入力してください");
            int num = 0;
            int count = 0;
            while(true){
                try{                    
                    num = int.Parse(Console.ReadLine());
                    if ((num < 1) || (num > 20)){
                        Console.WriteLine("1人以上20人以下で人数を指定してください");
                    } else {
                        break;
                    }
                }    
                catch{
                    Console.WriteLine("文字列を入力しないでください"); 
                }       
            }

            while (sr.Peek() != -1)
            {
                // ファイルを1行ずつ読み込み、標準出力に出力する
                Console.WriteLine(sr.ReadLine());
                count += 1;
                if (count == num){
                    break;
                }
            }
            // ファイルを閉じる
            sr.Close();

            Console.ReadKey();
        }
    }
}