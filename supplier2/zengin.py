#######   全銀協正会員リスト作成　###########
#######   新規作成  2024/05/20  ##########
#######   Author  takao.hattori ###########



def delete_out_file(file_name):
   import os
   os.remove(file_name) 

# テンプレートからエクセルファイルをコピーする関数
def copyexcelfile():
    import shutil
    import datetime
    import sys
    dt = datetime.datetime.now()
    date3 = dt.strftime('%Y%m%d')    
    base_file = "全銀協正会員テンプレート.xlsx"
    export_file = "全銀協正会員" + date3 + ".xlsx"
    # Excelファイルを開いていたら、Excelを閉じる
    try:
        shutil.copy(base_file,export_file)

    except:
        print(f"{export_file}を閉じてください") 
        sys.exit()   
    return export_file
    

#銀行名データクレンジング関数
def data_cleaning(str1):
    import re
    result1 = re.search('a href',str1)

    if result1:
        w_array1 = str1.split('>')
        w_bankname = w_array1[2]
    else:           
        w_array1 = str1.split(">")    
        w_bankname = w_array1[1]
        w_bankname = w_bankname.replace('</li','')
        w_bankname = w_bankname[4:]
        w_bankname = w_bankname.replace(' ','')
        
    w_bankname = w_bankname.replace('</a','')
    w_bankname = w_bankname.replace('銀行','')
    return w_bankname
    

# エクセルファイルに銀行名を出力する関数
def outputfile(result_file,bank_name,max_row):
    import openpyxl as op
    import sys
    wb = op.load_workbook(result_file)
    sh_name = '銀行'
    ws = wb[sh_name]
    ws.cell(row=max_row,column=3).value = bank_name
                
    # エクセルファイルの保存
    wb.save(result_file)
     
    
# メイン関数
def main():
    # 時間を計るライブラリをインポート
    import datetime
    import re
    import os
    # WebDriverライブラリをインポート
    from selenium import webdriver
    from selenium.webdriver.common.by import By
    # Excel出力ライブラリをインポート
    import openpyxl as op
    import codecs
    # 待機処理ライブラリをインポート
    from time import sleep

    # 現在日付を取得する変数
    dt = datetime.datetime.now()
    date3 = dt.strftime('%Y%m%d')
    # 出力先ファイル
    out_file = "zenginren.txt"
    # スクレイピング対象URL変数の定義
    target_url = 'https://www.zenginkyo.or.jp/abstract/outline/organization/member-01/'
    max_row = 5
    row_count = 0
    
    xpath_str1 = ""
    # Chromeを指定する

    driver = webdriver.Chrome()


    file_exist = os.path.isfile(out_file)
    if file_exist:
        delete_out_file(out_file)

    # Chromeを開いて企業HPにアクセスする
    try:
        driver.get(target_url)
        sleep(5)
 
    
        for i in range(1,120):
        
            try:
                xpath_str1 = '//*[@id="c14512"]/div/div/div/ul/li[' + str(i) + ']'
                element_str1 = driver.find_element(by=By.XPATH,value=xpath_str1)
                print(element_str1.get_attribute("outerHTML"),file=codecs.open(out_file,'a','utf-8'))
            
            except:
            
                break
        

    except EnvironmentError as e:
        str100 = e     
    except:
        str1000 = ""

    # 画面を閉じる
    driver.quit()


    export_file = copyexcelfile()


    fileobj = open(out_file,encoding="utf-8")
    while True:
        line1 = fileobj.readline()
        line1 = line1.replace("\n","")
        if line1:
            row_count += 1
        else:
            break  

        w_bankname = data_cleaning(line1) 
           
        outputfile(export_file,w_bankname,max_row)                
        max_row += 1

if __name__ == "__main__":
    main()        
    
