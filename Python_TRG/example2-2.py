
import csv

filename = "sales_data.csv"

# CSVファイルを読み込んで内容を表示
with open(filename, mode="r", encoding="utf-8") as file:
    reader = csv.reader(file)
    
    for row in reader:
        print(row)
