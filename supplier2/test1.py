weather_1 =""
count = 0

with open('text1.txt', encoding='utf-8') as f1:
    for line in f1:
        line = line.replace("\n","")
        if count == 0:
            weather_1 = "雪"
        elif count == 1:
            weather_1 = "雨"
        else:
            weather_1 = "晴"        
        output = f"""{line.format(weather_1=weather_1)}"""
        print(output)
        count += 1
    
