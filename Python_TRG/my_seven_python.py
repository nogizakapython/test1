
from datetime import date

# ファイル名と内容の定義
file_name = "自己紹介_遠藤さくら.txt"
lines = [
    "遠藤さくら",
    "CF-Procurement",
    "Python学習を開始しました",
    str(date.today())
]

# UTF-8でファイルに書き込む
with open(file_name, "w", encoding="utf-8") as f:
    for line in lines:
        f.write(line + "\n")
