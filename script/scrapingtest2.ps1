###########################################
#     スクレイピングテストスクリプト
###########################################
$FILENAME = "C:\Users\takao.hattori\OneDrive - Accenture\web1.txt"

$response = curl https://www.sap.com/
$response.Links |
Where-Object {
    $_.href -like “*”
}|
Select-Object innerText, href | Format-List | Out-File $FILENAME