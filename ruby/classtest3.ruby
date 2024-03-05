class Nogizaka

  # attr_accessor :name
  # setter: name=(value)
  # getter: name
  def initialize(name)
    @name = name
  end

  def jikosyokai
    puts "私は#{@name}です"
  end
end

nogi = Nogizaka.new("遠藤さくら")
nogi.jikosyokai
