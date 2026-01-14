
import pandas as pd

filename = "sales_data.csv"

df = pd.read_csv(filename, encoding="utf-8")

# ヘッダー（列名）
print("=== ヘッダー ===")
print(list(df.columns))

# データ（行）
print("\n=== データ ===")
# そのまま表示（行数が多い場合は head() などで調整）
print(df.to_string(index=False))

