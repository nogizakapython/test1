
import csv
from typing import List

filename = "sales_data.csv"

def compute_col_widths(rows: List[List[str]]) -> List[int]:
    """各列の最大幅を返す（全行を見て算出）"""
    # 列数は最長行に合わせる
    max_cols = max(len(r) for r in rows)
    widths = [0] * max_cols
    for r in rows:
        for i in range(max_cols):
            cell = r[i] if i < len(r) else ""
            # 数値は文字列化して幅を取る
            widths[i] = max(widths[i], len(str(cell)))
    return widths

def format_row(row: List[str], widths: List[int]) -> str:
    cells = []
    for i, w in enumerate(widths):
        val = str(row[i]) if i < len(row) else ""
        cells.append(val.ljust(w))
    return " | ".join(cells)

with open(filename, mode="r", encoding="utf-8") as f:
    reader = csv.reader(f)
    rows = [row for row in reader]

if not rows:
    print("CSVが空です。")
else:
    header = rows[0]
    data_rows = rows[1:]

    # 幅を計算（ヘッダー＋データ全体を対象）
    widths = compute_col_widths([header] + data_rows)

    # 表示
    print("=== ヘッダー ===")
    print(format_row(header, widths))

    print("\n=== データ ===")
    # 区切り線
    print("-" * (sum(widths) + 3 * (len(widths) - 1)))
    for r in data_rows:
        print(format_row(r, widths))
