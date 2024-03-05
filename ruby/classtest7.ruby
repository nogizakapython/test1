# クラス
#  - クラスメソッド
#  - クラス変数
#  - 定数

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

tom = User.new("Tom")
bob = User.new("Bob")
mai = User.new("Mai")

mai.name = "白石麻衣"
mai.sayHi
User.info
