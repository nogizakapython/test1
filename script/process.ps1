#############################################
#          chromeプロセス取り出し処理             #
#          新規作成:2023/1/18                #
#############################################

$LIST_DIR = "c:\script\file\"
$dat = Get-date -Format "yyyyMMdd"
$str = "slack"

Test-Path $LIST_DIR$dat.txt

if ($? -eq "True") {
    echo "すでにファイルが存在します"
} else {
    echo "ファイルを作成します"
    New-item $LIST_DIR$dat.txt
}

Get-Process >> $LIST_DIR$dat.txt


if ($? -eq "True"){
    echo "OK"
} else {
    echo "NG"
}

$count = (Get-Process | Select-String -Pattern $str |  Measure-Object).Count >> $LIST_DIR$dat.txt


if ($? -eq "True"){
    echo "OK"
} else {
    echo "NG"
}


         