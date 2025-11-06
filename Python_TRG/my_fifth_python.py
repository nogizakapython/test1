
from datetime import date

# ファイル名
filename = "日報.txt"

# 今日の日付を取得
today = date.today().isoformat()

# 書き込む内容
content = f"{today} Python学習開始\n"

# UTF-8でファイルに書き込む
with open(filename, "w", encoding="utf-8") as file:
    file.write(content)

# 完了メッセージ
print(f"{filename} に日付とメッセージを書き込みました。")
