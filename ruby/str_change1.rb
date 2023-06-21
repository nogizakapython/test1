# 文字列の大文字、小文字、反転
# 2023/6/22 Create

str = "Nogizaka46"
ans = ""

# 出力関数
def output(msg)
  puts msg
end

ans = str.downcase
output(ans)

ans = str.upcase
output(ans)

ans = str.swapcase
output(ans)
