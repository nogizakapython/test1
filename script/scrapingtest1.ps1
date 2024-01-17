###########################################
#     スクレイピングテストスクリプト
###########################################
$FILENAME = "C:\Users\takao.hattori\OneDrive - Accenture\web1.txt"

$response = curl https://www.accenture.com/jp-ja
$response.Links |
Where-Object {
    $_.href -like “*accenture.com*”
}|
Select-Object innerText, href | Format-List | Out-File $FILENAME