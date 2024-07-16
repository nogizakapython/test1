using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace Problem7_2
{
    class TwoStrings
    {
        // 一つ目の文字列
        private string string1;
        //  二つ目の文字列
        private string string2;
        //  一つ目の文字列を設定
        public string String1
        {
            set { string1 = value; }
            get { return string1; }
        }
        //  一つ目の文字列を設定
        public string String2
        {
            set { string2 = value; }
            get { return string2; }
        }

        
        public string GetConnectedString(string string1,string string2) {
            return string.Concat(string1,string2);
            
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            TwoStrings s = new TwoStrings();
             s.String1 = "Hello";
             s.String2 = "World";
             Console.WriteLine("一つ目の文字列は" + s.String1);
             Console.WriteLine("二つ目の文字列は" + s.String2);
             Console.WriteLine("二つの文字列を合成したものは" + s.GetConnectedString(s.String1,s.String2));
        }
    }
}