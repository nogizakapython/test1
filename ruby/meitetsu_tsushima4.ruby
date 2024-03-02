# 名鉄津島線の急行停車駅(準急・特急も同じ)駅名表示

tsushima_line_data = ["須ヶ口","甚目寺","七宝","木田","青塚","勝幡","藤浪","津島"]
express_stop_data = ["須ヶ口","甚目寺","木田","勝幡","津島"]
station_num = tsushima_line_data.length
express_stop_num = express_stop_data.length

for i in 0...station_num do
  station_info = tsushima_line_data[i]
  express_stop_flag = express_stop_data.index(station_info)
  # print(express_stop_flag)
  if express_stop_flag == nil then
    puts "#{station_info}駅は急行停車駅ではありません"
  else
    puts "#{station_info}駅は急行停車駅です"
  end
end
