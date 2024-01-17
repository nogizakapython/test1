###########################################
#     スクレイピングテストスクリプト
###########################################
$FILENAME = "C:\Users\takao.hattori\OneDrive - Accenture\web3.txt"

$response = curl https://www.yahoo.co.jp/
$response.Links |
Where-Object {
    $_.href -like “*”
}|
Select-Object innerText, href | Format-List | Out-File $FILENAME 