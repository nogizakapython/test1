using System;

class User {
    public string name;
    public User() {
        this.name = "nobody";
    }
    public User(string name){
        this.name = name;
        // Console.WriteLine("Hi,{0}",this.name);
    }

    public void SayHi(){
        Console.WriteLine("Hi,{0}",this.name);
    }
}

class MyApp {
    static void Main(string[] args){
        User user = new User();
        Console.WriteLine(user.name);
        User u = new User("Eto");
        u.SayHi();
    }
}