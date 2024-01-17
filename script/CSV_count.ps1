########################################################
#       CSVファイルの人数処理                             ###
#       Create    2023/8/8                           ###
########################################################

$day = Get-Date -Format "yyyyMMdd"
$FILEPATH = "C:\Users\takao.hattori\OneDrive - Accenture\"
$FILENAME = $args[0]
$RESULTFILENAME = $day + $FILENAME
Get-Content $FILEPATH$FILENAME | Select-Object -Skip 1 | Set-Content $FILEPATH$RESULTFILENAME