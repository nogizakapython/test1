using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace Dotin10
{
    class MyData<T> {
        public void GetThree(T x){
            for(int i=0;i<3;i++){
                Console.WriteLine(x);
            }    
            
        }
    }
    
    class MyApp
    {
        static void Main(string[] args)
        {
            MyData<int> mi = new MyData<int>();
            mi.GetThree(55);
            MyData<string> msg = new MyData<string>();
            msg.GetThree("C#");
            MyData<double> fv = new MyData<double>();
            fv.GetThree(72.5);

        }    
    }
}