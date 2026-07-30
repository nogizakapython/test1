#########################################
####   JGPHログ　ログ削除処理         ###
####   新規作成   2026/7/30           ###
####   Author by takao.hattori        ###
#########################################

$logpath = "C:\Users\takao.hattori\OneDrive - Accenture\JGPH_log"
$result_csv = "C:\Users\takao.hattori\OneDrive - Accenture\JGPH_log\filelist.csv"

$file_type = "*.csv"

cd $logpath

# 基準日（今日から7日前）
$Threshold = (Get-Date).AddDays(-7)

# 7日前より古いログファイルを取得
$OldLogs = Get-ChildItem -Path $logpath -Filter $file_type -File |
    Where-Object { $_.LastWriteTime -le $Threshold }

# 結果を表示
$OldLogs | Select-Object Name | Export-Csv -path $result_csv

