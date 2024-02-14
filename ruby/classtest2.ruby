class User
  def initialize(name)
    @name = name
  end
  def sayHi
    puts "Hi i am #{@name}"
  end
end

tom = User.new("tom")
tom.sayHi

rei = User.new("大園玲")
rei.sayHi
