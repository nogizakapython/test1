
import csv

filename = "sales_data.csv"

with open(filename, mode="r", encoding="utf-8") as f:
    reader = csv.reader(f)
    header = next(reader)  # ヘッダー取得

    print("=== 営業部のデータ ===")
    print(header)

    for row in reader:
        # 部門（最後の列）が「営業」の行だけ表示
        if row[-1] == "営業":
            print(row)
