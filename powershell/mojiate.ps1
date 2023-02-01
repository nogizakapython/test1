##########################
##########################
####  文字当てクイズ     #####
####  新規作成 2023/1/31 ##
####  修正    2023/2/1  ##
##########################


$num = 4
$i = 0
$j = 1

####正解文字列を作成する


function ans_str {
    while($true){
        $random = Get-Random -Minimum 1 -Maximum 5
        if ($random -eq 1){
            $msg = $msg + "A"
        } elseif ($random -eq 2) {
            $msg = $msg + "B"
        } elseif ($random -eq 3) {
            $msg = $msg + "C"
        } elseif ($randon -eq 4) {
            $msg = $msg + "D"
        } else {
            $msg = $msg + "C"
        }
        if($i -eq 3){
            return $msg
            break
        }
        $i += 1
    }
}


#####入力文字列作成処理
function str_input {
    while($true){
        $msg = Read-Host("A,B,C,Dの4文字を使ったアルファベット4語を入力してください")
        $flag = $msg -match '[A-D][A-D][A-D][A-D]'
        if($flag -eq "True") {
            $count = $msg.Length
            if ($count -eq $num){
                return $msg
            } else {
                Write-Host("4文字にしてください")
            }
        } else {
            Write-Host("A,B,C,D以外入力しないでください")
        }

    }
       
}


####################
#####メイン処理########
$ans_str = ans_str

##正解まで繰り返す
while($true) {
    $input_str = str_input
    if($ans_str -eq $input_str){
        Write-Host("${j}回目で文字列がそろって正解です")
        break
    } else {
        Write-Host("${j}回目、不正解です")
        $ans_array = $ans_str.ToCharArray()
        $inp_array = $input_str.ToCharArray()
        for($k=0;$k -lt $num;$k++){
            if ($ans_array[$k] -eq $inp_array[$k]){
                $p = $k + 1
                Write-Host("左から${p}文字目が正解です")
            }
        }
        $j++
    }
}

