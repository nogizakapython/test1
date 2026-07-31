import random
import os

# 朝会ファシリテーター候補者一覧
array1 = [
    "shingo.a.maeda",
    "takao.hattori",
    "hironori.tanikawa",
    "eri.wakabayashi"
]

# 結果出力ファイル名
result_file = "result.txt"

# 担当者格納用変数
monday_in_charge = ""
tuesday_in_charge = ""

# 既存の結果ファイルがある場合は削除
if os.path.exists(result_file):
    os.remove(result_file)

# 火・木担当者選出用のループ制御フラグ
loop_flag = False

# 月・水・金担当者をランダム選出
monday_in_charge = random.choice(array1)

# 火・木担当者をランダム選出
# 月・水・金担当者と重複しないようにする
while loop_flag == False:
    tuesday_in_charge = random.choice(array1)

    if tuesday_in_charge != monday_in_charge:
        loop_flag = True

# 結果をテキストファイルへ出力
with open(result_file, 'a') as fs:

    # 月・水・金担当者
    print(
        f"月、水、金の朝会のファシリ担当は{monday_in_charge}さんです",
        file=fs
    )

    # 火・木担当者
    print(
        f"火、木の朝会のファシリ担当は{tuesday_in_charge}さんです",
        file=fs
    )