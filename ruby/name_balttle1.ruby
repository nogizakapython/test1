# ネーミングバトラー


def hitpoint()
  hp_value = Random.new()
  hp_value = rand(200)
  return hp_value
end

def attach()
  attach_value = Random.new()
  attack_hp = rand(50)
  return attack_hp
end

puts "名前を入力してください"
str1 = gets.chomp
HP1 = hitpoint


puts "名前を入力してください"
str2 = gets.chomp
HP2 = hitpoint


while true
  puts str1 + "の攻撃"
  A_HP2 = attach
  HP2 = HP2 - A_HP2
  puts str2 + "に" + A_HP2.to_s + "ポイントのダメージ"
  if HP2 <= 0 then
    puts str1 + "の勝ちです"
    puts str1 + "の残りHPは" + HP1.to_s + "です"
    break
  end
  puts str2 + "の攻撃"
  A_HP1 = attach
  HP1 = HP1 - A_HP1
  puts str1 + "に" + A_HP2.to_s + "ポイントのダメージ"
  if HP1 <= 0 then
    puts str2 + "の勝ちです"
    puts str2 + "の残りHPは" + HP2.to_s + "です"
    break
  end
end
