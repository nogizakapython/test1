######### ランダムに配列から文字を表示###
###### 新規作成 2023/3/3          ######
#########################################


$input_ans = 0
$ans = 0
$cnt = 0
$sw = 0
$result = @();

function random(){
    $ans =  Get-Random -Minimum 1 -Maximum 20
    return $ans
}


while ($cnt -lt 5 ){
    $ans1 = random
    switch ($ans1 % 5){
        0 { $result += "秋元真夏"}
        1 { $result += "梅澤美波"}
        2 { $result += "桜井玲香"}
        3 { $result += "菅井友香"}
        4 { $result += "佐々木久美" }
    }
    $cnt++
}            


foreach($data in $result){
    Write-Host($data)
}

