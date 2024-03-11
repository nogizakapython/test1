from datetime import datetime
import re
base_url = "https://www.cosmo-energy.co.jp/ja/about/press.html#"
target_url = ""
date_now = datetime.now()
date1 = date_now.strftime('%Y/%m/%d')
date2 = date_now.strftime('%Y')
date3 = date_now.strftime('%m')
date4 = int(date2) - 1
date1 = '20240403'
search_list = ["0401","0402","0403","0404","0405","0406","0407"]
# 年度始めなので、前年度と今年度の2つの情報を取得
year_list = []
for i in search_list:
    result1 = re.search(i,date1)
    if result1:
        year_list.append(date2)
        year_list.append(date4)
    
            

for j in list(year_list):
    target_url = base_url + str(j)
    print(target_url)
    

