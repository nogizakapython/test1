p "name : %s" % "sukaguchi"
# 左から１０桁
p "name : %10s" % "shobata"
# 右から１０桁
p "name : %-10s" % "aotsuka"

#
p "id: %05d,rate: %10.2f" % [355,3.284]

printf("name : %10s\n","jimokuji")
printf("id: %05d,rate: %10.2f" % [177,2.718])

p sprintf("name : %10s\n","jimokuji")
p sprintf("id: %05d,rate: %10.2f" % [177,2.718])
