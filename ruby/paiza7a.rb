array1 = ["草皆美樹","河村美樹","菅智美"]
m_array = []
m_array = array1.shuffle!
array2 = ["好きな体位","嫌いな体位","興奮する体位"]
t_array = []
t_array = array2.shuffle!

n=array1.length
for i in 0...n do
    name = m_array[i]
    title = t_array[i]
    File.open("result1.txt",mode="a"){|f|
      f.write(name + "," + title + "\n")

    }

end
