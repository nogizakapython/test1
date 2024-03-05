class User

  attr_accessor :name
  # attr_reader (getterのみ)
  # setter: name=(value)
  # getter: name
  def initialize(name)
    @name = name
  end

  def sayHi
    # puts "私は#{@name}です"
    puts "私は#{self.name}です"
    puts "私は#{name}です"

  end
end

tom = User.new("Tom")

tom.name = "tom Jr."
p tom.name

tom.sayHi
