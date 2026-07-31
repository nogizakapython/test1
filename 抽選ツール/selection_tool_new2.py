import random
import os


# 結果出力ファイル名
result_file = "result.txt"

# 担当者格納用変数
monday_in_charge = ""
tuesday_in_charge = ""


def main():
    # 既存の結果ファイルがある場合は削除
    if os.path.exists(result_file):
        os.remove(result_file)

    # 朝会ファシリテーター候補者一覧
    members = [
        "shingo.a.maeda",
        "takao.hattori",
        "hironori.tanikawa",
        "eri.wakabayashi"
    ]

    monday_in_charge = random.choice(members)
    tuesday_in_charge = random.choice(
        [member for member in members if member != monday_in_charge]
    )

    # 結果をテキストファイルへ出力
    with open(result_file, 'a') as fs:

        # 月・水・金担当者
        print(f"月、水、金の朝会のファシリ担当は{monday_in_charge}さんです",file=fs)

    # 火・木担当者
    print(f"火、木の朝会のファシリ担当は{tuesday_in_charge}さんです",file=fs)