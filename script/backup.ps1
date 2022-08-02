############# バックアップスクリプト   #########
############# 新規作成  2022/8/2      ###
########################################

#バックアップ先ディレクトリの定義
$backup_dir = 'C:\backup'
#バックアップ先のディレクトリ日付を取得する
$dir_name = Get-Date -Format "yyyyMMdd"
#バックアップ元のディレクトリの定義
$base_dir = 'C:\work\'


function check($code) {
    if($code -eq "True") {
        echo "OK"
    } else {
        echo "NG"
    }
}



#バックアップディレクトリの作成
mkdir $backup_dir\$dir_name

#リターンコードの定義
$code = echo $?
check($code)



#バックアップファイルの取得「
Copy-Item $base_dir -Recurse $backup_dir\$dir_name

#リターンコードの定義
$code = echo $?
check($code)


