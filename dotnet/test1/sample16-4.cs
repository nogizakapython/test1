using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
 
namespace SampleEx704
{
    class Program
    {
        static int GetNum(int i)
        {
            int[] nums = { 300, 600, 900 };
            if (i > nums.Length)
            {
                //  例外を発生させる
                throw new IndexOutOfRangeException();
            }
            return nums[i];
 
        }
        static void Main()
        {
            try
            {
                int result = GetNum(4);
            }
            catch (IndexOutOfRangeException e)
            {
                Console.WriteLine("配列の範囲外にアクセスしました。");
            }
 
        }
    }
}