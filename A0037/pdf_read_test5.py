# ライブラリのインポート
from pypdf import PdfReader
import os
import csv

# 入力するPDFファイル
path = 'ENEOS_kessan.pdf'

# 出力先ファイル（位置情報付きCSV）
out_file = './result3.csv'



def main():
    text = ""
    reader = PdfReader(path)
    for i in range(len(reader.pages)):
        page = reader.pages[i]
        text += page.extract_text()
    

    if os.path.exists(out_file):
        os.remove(out_file)

    # CSVに書き出し
    try:
        with open(out_file,mode='a',encoding='utf-8') as f:
            print(text,file=f)
    except UnicodeEncodeError:
        print(f"Please check {out_file}'s encoding")

    print("END PROCEDURE")


if __name__ == '__main__':
    main()
