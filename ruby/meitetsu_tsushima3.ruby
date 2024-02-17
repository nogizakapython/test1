# 名鉄津島線の駅名表示

$tsushima_line_data = ["須ヶ口","甚目寺","七宝","木田","青塚","勝幡","藤浪","津島"]
station_num = $tsushima_line_data.length

start_num = 0
i = station_num - 1

def space()
  puts ""
end

# 名鉄津島線の上り方面の駅名を順に表示(津島から須ヶ口)
def nobori(num1,num2)
  i = num1
  finish_num = num2
  while i >= num2
    puts $tsushima_line_data[i]
    i -= 1
  end
end
space

# 名鉄津島線の下り方面の駅名を順に表示(須ヶ口から津島)
def kudari(num1,num2)
  j = num1
  while j < num2
    puts $tsushima_line_data[j]
    j += 1
  end
end

nobori(i,start_num)
space
kudari(start_num,station_num)
