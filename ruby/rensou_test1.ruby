scores = {"misa" => 30,"nao" => 5}
p scores
scores1 = {:mai => 50,:erika => 70}
p scores1
scores2 = {manatsu: 80,kana:81,mio:83}
p scores2
p scores2.size
p scores2[:mio]
scores2[:manatsu] = 82
p scores
p scores2.keys
p scores2.values
p scores.sort
p scores.sort.to_h
p scores.sort_by { |_, v |v}.to_h
p scores2.sort_by { |_,v|v}.to_h
