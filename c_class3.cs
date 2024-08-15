// オーバーロードの勉強

using System;

class User {
    public string name;
    
    public User(string name){
        this.name = name;
        // Console.WriteLine("Hi,{0}",this.name);
    }

    public User() : this("nobody") {
    
    }

    public void SayHi(){
        Console.WriteLine("Hi,{0}",this.name);
    }
}

class MyApp {
    static void Main(string[] args){
        User user = new User();
        user.SayHi();
        User u = new User("Eto");
        u.SayHi();
    }
}