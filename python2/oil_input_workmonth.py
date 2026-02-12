#######   ICEnergy 石油平均価格推移情報取得ツール　###########
#######   新規作成  2026/01/14  ##########
#######   Author  takao.hattori ###########


# WebDriverライブラリをインポート
from selenium import webdriver
from selenium.webdriver.common.by import By
# opempyxlライブラリをインポート
import openpyxl as op
# 待機時間ライブラリをインポート
from time import sleep
# 共通クラスをインポートする
import oil_common_data 


# 取得先のURLの変数
target_url = 'https://pps-net.org/statistics/crude-oil'

# 取得結果格納配列
data_array = []


   
# 作業対象月のデータクレンジング処理
def work_month_data_cleansing(ymd):
    # 余分な文字列を削除
    ymd = ymd.replace("<th>","")
    ymd = ymd.replace("</th>","")
    w_array = ymd.split('/')
    
    month = w_array[1]
    work_month = ""
    # 作業対象月が1月の時は西暦を付けてYYYY年MM月に、1月以外はMM月に変換する
    month = int(month)
    if month == 1:
        work_year = w_array[0]
        
        work_month = work_year + "年" + str(month) + "月"
    else:
        work_month = str(month) + "月"
    # 文字列を返す
    return work_month



# メイン関数
def main():
    # 出力開始行の変数
    start_row_num = 1
    # 出力先の列数変数
    col_num = 2
    # 出力先の列数変数
    col_num = 2
    row_num = start_row_num
    # Chromeを指定する
    driver = webdriver.Chrome()
    # インスタンスを呼び出す
    output_e = oil_common_data.Common_data()

    try:
        driver.get(target_url)
        sleep(1)

        for i in range(11,17,5):
            for j in range(2,14):
                try:
                    xpath_str1 = '/html/body/div[4]/div[1]/div[1]/div/div/table[2]/tbody/tr[' + str(i) + ']/th[' + str(j) + ']'
                    
                    element_str = driver.find_element(by=By.XPATH,value=xpath_str1)
                    ymd_data = element_str.get_attribute("outerHTML")
                    data_array.append(ymd_data)
           
                except:
                    exit(1)
        
    except EnvironmentError as e:
        print("作業対象月の年月を取得できませんでした")
        exit(1)     
    
    array_length = len(data_array)
    for k in range(0,array_length):
        ymd_data = data_array[k]
        ymd_data = work_month_data_cleansing(ymd_data)
        output_e.output_data(ymd_data,row_num,col_num)
        col_num += 1
    

if __name__ == "__main__":
    main()
    