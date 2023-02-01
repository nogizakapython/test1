# 複数行データを配列に格納する
array = []
while line = gets
    line.chomp!
    array.push(line)
    #p line
end
array.each{|var|
    p var
}
