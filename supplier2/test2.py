weather_1 =""
count = 0

with open('text1.txt', encoding='utf-8') as f:
    lines = f.readline()
    lines = lines.replace("\n",'')
    while True:
        if lines == "":
            break
        else:
            if count == 0:
                weather_1="fine"
            elif count == 1:
                weather_1="rain"
            else:
                weather_1="snow"        
        output = f"""{lines.format(weather_1=weather_1)}"""
        print(output)
    