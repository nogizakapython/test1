
from datetime import date

# ファイルパス（スラッシュ区切り）
file_path = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\Python_TRG\\日報.txt'

# 今日の日付を取得
today = date.today().isoformat()

# 書き込む内容
content = f"{today} Python学習開始"

# UTF-8でファイルに書き込む
with open(file_path, "w", encoding="utf-8") as f:
    f.write(content)

print(f"ファイル '{file_path}' に内容を書き込みました。")
