#class User
# public
# protect
# Private レシーバーを指定できない

class User

  def sayHi
    puts "hi!"
    sayPrivate
    # self.sayPrivate
  end

  private

    def sayPrivate
      puts "private"
    end

end

class AdminUser < User
  # def sayHello
  #   puts "hello!"
  #   sayPrivate
  # end
  def sayPrivate
    puts "private from Admin"
  end

end

User.new.sayHi
AdminUser.new.sayPrivate
