// 継承
// User -> AdminUser

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

    public virtual void SayHi(){
        Console.WriteLine("Hi,{0}",this.name);
    }
}
class AdminUser : User {
    public AdminUser(string name): base(name) {

    }
    public void SayHello(){
        Console.WriteLine("Hi,{0}",this.name);
    }
    public override void SayHi(){
        Console.WriteLine("[Admin] Hi,{0}",this.name);
    }
}

class MyApp {
    static void Main(string[] args){
        User user = new User();
        Console.WriteLine(user.name);
        User u = new User("Eto");
        u.SayHi();
        AdminUser n = new AdminUser("Nishikawa");
        n.SayHi();
        n.SayHello();
    }
}