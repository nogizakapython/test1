# 入力した文字の配列を作成する。



#####正解文字列作成処理
function str_input {
    while($true){
        $msg = Read-Host("A,B,Cの3文字を使ったアルファベット3語を入力してください")
        $flag = $msg -match '[A-C][A-C][A-C]'
        if($flag -eq "True") {
            $count = $msg.Length
            if ($count -eq 3){
                return $msg
            } else {
                Write-Host("3文字にしてください")
            }
        } else {
            Write-Host("A,B,C以外入力しないでください")
        }

    }
       
}

$input = str_input
echo $input

