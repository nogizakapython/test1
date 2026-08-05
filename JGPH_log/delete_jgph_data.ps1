#########################################
####   JGPHログ　ログ削除処理         ###
####   新規作成   2026/7/30           ###
####   Author by takao.hattori        ###
#########################################
# カレントディレクトリ一時ファイルの変数定義
$listfile = "example.txt"

# 削除対象ファイルのディレクトリの格納先変数の定義
$logpath = ""


# JGPHツールのログファイルの7日前以前のファイル一覧を出力するファイル名変数の定義
$result_csv = "C:\Users\takao.hattori\OneDrive - Accenture\JGPH_log\filelist.csv"

# 削除対象のファイルの拡張子変数の定義
$file_type = "*.xlsx"

# カレントディレクトリを$listfile変数に指定したテキストファイルに出力する
Get-Location > $listfile

# カレントディレクトリ表示コマンドの出力結果を1行ずつ読み込み、「C:\」の行を$logfile変数に代入する
foreach($line1 in Get-Content -Path $listfile ){
    if($line1 -match "C:\\"){
        $logpath = $line1
    }
}


# カレントディレクトリに移動する
cd $logpath

# 基準日（今日から7日前）
$Threshold = (Get-Date).AddDays(-7)

# 7日前より古いログファイルを取得
$OldLogs = Get-ChildItem -Path $logpath -Filter $file_type -File |
    Where-Object { $_.LastWriteTime -le $Threshold }

# 結果を表示
$OldLogs | Select-Object Name | Export-Csv -path $result_csv -Encoding UTF8 

# CSVファイルを1行ずつ読み込み、最終更新日が7日より前のファイルを削除する
foreach ($line in Get-Content -Path $result_csv  -Encoding UTF8) {
    # $lineの値が「#TYPE Selected.System.IO.FileInfo」かつ「"Name"」出ない場合、$line変数の中身を表示する
    if( -not ($line -eq "#TYPE Selected.System.IO.FileInfo") -and ( -not ($line -eq '"Name"' ))) {
        $line = $line.Replace('"','') 
        Remove-Item $line
        
        
    }
}