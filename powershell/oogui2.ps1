######### ランダムに配列から文字を表示###
###### 新規作成 2023/3/3          ######
#########################################


#乱数を格納する変数
$ans = 0
#カウント変数
$cnt = 0
#大食いメッセージ
$msg = "は大食いです"
#データ配列
$data = @("松村沙友理","生田絵梨花","梅澤美波","池田瑛紗","向井葉月","弓木奈於")
#結果配列
$result = @();

##ランダムの数字を発生するユーザー定義関数
function random(){
    $ans =  Get-Random -Minimum 0 -Maximum $data.Length
    return $ans
}

#10回ループを繰り返し、配列の要素を5つ入れる
while ($cnt -lt 10 ){
    $ans1 = random
    switch ($ans1 % 5){
        0 { $result += $data[$ans1] + $msg}
        1 { $result += $data[$ans1] + $msg}
        2 { $result += $data[$ans1] + $msg}
        3 { $result += $data[$ans1] + $msg}
        4 { $result += $data[$ans1] + $msg }
    }
    $cnt++
}            

#配列の要素を取り出す
foreach($data in $result){
    Write-Host($data)
}

