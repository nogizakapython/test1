# ライブラリのインポート
from pypdf import PdfReader
import os
import csv

# 入力するPDFファイル
path = 'ENEOS_kessan.pdf'

# 出力先ファイル（位置情報付きCSV）
out_file = './result_with_position.csv'


def extract_text_with_position(page, page_num):
    # ページからテキストと位置情報を抽出する"""
    results = []

    def visitor_body(text, _cm, tm, _font_dict, font_size):
        # テキスト描画時に呼ばれるコールバック関数"""
        if text.strip():
            # tm は変換行列 [a, b, c, d, e, f]
            # e = x座標, f = y座標
            x = tm[4]
            y = tm[5]
            results.append({
                'page': page_num + 1,
                'text': text,
                'x': round(x, 2),
                'y': round(y, 2),
                'font_size': round(font_size, 2) if font_size else None,
            })

    page.extract_text(visitor_text=visitor_body)
    return results


def main():
    reader = PdfReader(path)
    all_results = []

    for i in range(len(reader.pages)):
        page = reader.pages[i]
        print(f"Processing page {i + 1} / {len(reader.pages)} まで完了しました！")
        page_results = extract_text_with_position(page, i)
        all_results.extend(page_results)

    if os.path.exists(out_file):
        os.remove(out_file)

    # CSVに書き出し
    fieldnames = ['page', 'text', 'x', 'y', 'font_size']
    try:
        with open(out_file, mode='w', newline='', encoding='utf-8-sig') as f:
            writer = csv.DictWriter(f, fieldnames=fieldnames)
            writer.writeheader()
            writer.writerows(all_results)
        print(f"Output: {out_file}  ({len(all_results)} records)")
    except UnicodeEncodeError:
        print(f"Please check {out_file}'s encoding")

    print("END PROCEDURE")


if __name__ == '__main__':
    main()
