
import pandas as pd

filename = "sales_data.csv"

df = pd.read_csv(filename, encoding="utf-8")

# 「部門」が営業の行だけ抽出
sales_df = df[df["部門"] == "営業"]

print("=== 営業部のデータ ===")
print(sales_df.to_string(index=False))
