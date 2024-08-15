using System;

class User {
    public string name = "Hattori";
    public void SayHi(){
        Console.WriteLine("Hi,{0}",name);
    }
}

class MyApp {
    static void Main(string[] args){
        User user = new User();
        Console.WriteLine(user.name);
        user.name = "Eto";
        user.SayHi();
    }
}