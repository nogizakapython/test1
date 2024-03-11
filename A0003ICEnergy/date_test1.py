# ライブラリのimport
from datetime import datetime,timedelta

# 今日の日付を取得
today = datetime.now()
# 昨日の日付を取得
yesterday = today - timedelta(1)

# 今日と昨日の日付を表示する
today1 = today.strftime('%Y/%m/%d')
yesterday1 = yesterday.strftime('%Y/%m/%d')

print(today1)
print(yesterday1)