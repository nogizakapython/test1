# 名鉄津島線の急行停車駅(準急・特急も同じ)駅名表示

tsushima_line_stations = ["須ヶ口","甚目寺","七宝","木田","青塚","勝幡","藤浪","津島"]
express_stop_stations = ["須ヶ口","甚目寺","木田","勝幡","津島"]

for station in tsushima_line_stations do
  if express_stop_stations.include? station then
    puts "#{station}駅は急行停車駅です"
  else
    puts "#{station}駅は急行停車駅ではありません"
  end
end
