# JSON 表示テスト
# 新規作成 2024/6/7

def main():
    
    import json
    file_name = "text1.json"  
    # JSONファイルを開く  
    json_open = open(file_name, 'r')
    # JSONファイル内のデータをロードする
    json_load = json.load(json_open)

    print(json_load)
    print(json_load['section1'])
    print(json_load['section2'])

if __name__ == "__main__":
    main()        
