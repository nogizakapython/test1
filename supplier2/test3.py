weather_1 =""
count = 0

with open('text1.txt', encoding='utf-8') as f1:
    for line in f1:
        line = line.replace("\n",'')
        if count == 0:
            weather_1="fine"
        elif count == 1:
            weather_1="rain"
        else:
            weather_1="snow"        
        
        output = f"""{line.format(weather_1=weather_1)}"""
        print(output)
        count += 1
