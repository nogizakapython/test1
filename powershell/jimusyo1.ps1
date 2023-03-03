#########################################
########## Powershell  ##################
######### ランダムに配列から文字を表示###
###### 新規作成 2023/3/3          ######
#########################################


$input_ans = 0
$ans = Get-Random -Minimum 0 -Maximum 6
$cnt = 0
$sw = 0
$array1 = @('秋元真夏','白石麻衣','西野七瀬','生田絵梨花','齋藤飛鳥','松村沙友理','桜井玲香');
$result = @();

switch ($ans){
    0 { $result += "$array1[$ans}さんは事務所移籍しました"}
    1 { $result += "$array1[$ans}さんは事務所にとどまっています"}
    2 { $result += "$array1[$ans}さんは事務所にとどまっています"}
    3 { $result += "$array1[$ans}さんは事務所移籍しました"}
    4 { $result += "$array1[$ans}さんは事務所にとどまっています"}
    5 { $result += "$array1[$ans}さんは事務所にとどまっています"}
    6 { $result += "$array1[$ans}さんは事務所にとどまっています"}
}            

Write-Host($result.Count)
foreach($data in $result){
    Write-Host($data)
}

