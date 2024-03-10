class User
  attr_accessor :name
  @@count = 0
  VERSION = 1.1
  def initialize(name)
    @@count += 1
    @name = name
  end

  def sayHi
    # puts "私は#{@name}です"
    puts "私は#{self.name}です"
    # puts "私は#{name}です"
  end

  def self.info
    puts "User Class #{@@count} Instance Count"
    puts "#{VERSION}"
  end
end

class AdminUser < User
  def sayHello
    puts "Hello from #{name}"
  end
  # オーバーライド
  def sayHi
    puts "hi! from admin user #{self.name}"
  end
end


mai = AdminUser.new("白石麻衣")
mai.sayHello
mai.sayHi
AdminUser.info
