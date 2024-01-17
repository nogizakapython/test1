#################################################
#    社員数取得スクリプト                            ## 
#    Create     2023/8/8                       ##
#    Author     Takao.Hattori                  ##
#    スクリプトの実行方法                            ##
#    ①Powershellのコンソールを開く                   ##
#    ②./syainsu_count1.ps [人数を調べるファイル]     ##
#     で実行する                                  ##
#    ex ./syainsu_count1.ps count1.txt         ##
#################################################

#社員数を取得したいファイルのファイルパス(絶対パス)
$TARGET = "C:\Users\takao.hattori\OneDrive - Accenture\"
#引数を変数に代入する
$FILENAME = $Args[0]
#テキストファイルを配列に格納する
$array1 = Get-Content $TARGET$FILENAME
#人数変数
$count = 0

#1行ずつ読み込み、人数をカウントアップする。
ForEach ($item in $array1) {
    $count += 1

}

#結果出力変数
$RESULT = [string] $count + "人です"
Write-Host $RESULT


