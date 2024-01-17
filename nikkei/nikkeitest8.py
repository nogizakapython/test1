########################################################
#####  正規表現,文字置換テスト        ###################
#####  新規作成 2023/12/11 takao.hattori  ###############
#####  修正     2023/12/18 takao.hattori 人事、企業名のみを処理するように修正 ########
########################################################

import os
import nikkeioutput

# ディレクトリ
#dir1 = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\python1\\result\\'
#dir2 = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\python1\\'

#input File　(日経サイトから取得したファイル) 
input_file = "result1.csv"
# 突合せ用ファイル
read_file = "nikkei_read.csv"
#output file
output_file = "result2.csv"
array3 = ["（1）","（2）","（3）","（4）","（5）","（6）"]


is_file = os.path.isfile(output_file)


if is_file:
    os.remove(output_file)

with open(input_file) as f1:
    for line1 in f1:
        array1 = line1.split(",")
        array2 = array1[0].split("、")
        #「人事、企業名」のフォーマットの時にline1のデータを作成する。
        if len(array2) == 2:
            lines1 = array2[1] + "、" + array2[0] + array1[1] + array1[2]
            lines1 = lines1.rstrip("\n")
                       
        #print(lines1)
        # CSVファイル書き込みクラスのインスタンスを呼び出す
        output1 = nikkeioutput.FileOutput(output_file,line1)
        with open(read_file) as f2:
            for line2 in f2:
                lines2 = line2.rstrip("\n")
                # 「人事、企業名」のフォーマットの時に突合せ処理を実施する。                               
                if len(array2) == 2:
                    if array2[1] == lines2:
                        output1.write_file()                    
                    else:            
                        str1 = array2[1]
                        for i in list(array3):
                            str2 = lines2 + i
                            if str1 == str2:
                                output1.write_file()
                     