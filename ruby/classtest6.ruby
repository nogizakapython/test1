class User

  attr_accessor :name
  # attr_reader (getterのみ)
  # setter: name=(value)
  # getter: name

  @@count = 0
  def initialize(name)
    @@count += 1
    @name = name
  end

  def sayHi
    # puts "私は#{@name}です"
    puts "私は#{self.name}です"
    puts "私は#{name}です"
  end

  def self.info
    puts "User Class #{@@count} Instance Count"
  end
end

tom = User.new("Tom")
bob = User.new("Bob")

User.info
