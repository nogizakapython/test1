ans = rand(100)
res = ans % 3

case res
when 0 then
  p "大吉"
when 1 then
  p "吉"
when 2 then
  p "小吉"
end
