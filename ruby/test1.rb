num1 = gets
puts num1.to_s.reverse.gsub( /(\d{3})(?=\d)/, '\1,').reverse
