
import csv

# 作成するCSVファイル名
filename = "sales_data.csv"

# サンプルデータ
data = [
    ["商品名", "売上金額", "担当者", "日付", "部門"],
    ["ノートPC", 150000, "佐藤", "2026-01-05", "営業"],
    ["プリンター", 32000, "田中", "2026-01-06", "営業"],
    ["モニター", 28000, "鈴木", "2026-01-07", "販売"],
    ["USBメモリ", 1200, "高橋", "2026-01-07", "販売"],
    ["キーボード", 4500, "伊藤", "2026-01-08", "営業"],
]

# CSV書き込み
with open(filename, mode="w", newline="", encoding="utf-8") as file:
    writer = csv.writer(file)
    writer.writerows(data)

print(f"{filename} を作成しました。")
