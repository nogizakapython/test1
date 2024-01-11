require 'fileutils'

array1 = ["草皆美樹","河村美樹","菅智美","佐藤美佐子","南条悦子","白濱智子","水谷紀子","橋本亜希子","清水二三代"]
m_array = []
m_array = array1.shuffle!
array2 = ["しみけん","チョコボール向井","羽賀研二","はるな愛","大島薫","服部隆央","一徹","加藤鷹","押尾学"]
t_array = []
t_array = array2.shuffle!
out_file = "result.txt"

begin
  FileUtils.rm(out_file)
  puts "#{out_file}を削除しました"
rescue
  puts "#{out_file}を削除できません"
end

n=array1.length
for i in 0...n do
    name = m_array[i]
    title = t_array[i]
    begin
      File.open(out_file,mode="a"){|f|
        f.write(name + "," + title + "\n")
      }
    rescue => e
      print("Error")
    end
end
