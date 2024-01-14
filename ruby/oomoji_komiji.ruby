#大文字に変換
def oomoji(msg)
    msg1 = msg.upcase
    return msg1
end

#小文字に変換
def komoji(msg)
    msg2 = msg.downcase
    return msg2
end
# 文字列の出力
def disp(msg)
    puts msg
end

name = 'test'
disp(name)
name1 = oomoji(name)
disp(name1)
name2 = komoji(name1)
disp(name2)
