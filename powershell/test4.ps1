# 入力した文字の配列を作成する。

$num = 3
$input_array = @()



#####正解文字列作成処理
function str_input {
    for($i=0;$i -lt $num;$i++){
        $msg = Read-Host("A,B,Cの文字1文字を入力してください")
        if($msg -eq "A"){
            $input_array +=  $msg
        } elseif ($msg -eq "B"){
            $input_array +=  $msg
        } elseif ($msg -eq "C"){
            $input_array += $msg
        }
    }
}

str_input
foreach($str in $input_array){
    Write-Host($str)
}
