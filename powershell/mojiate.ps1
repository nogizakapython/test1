##########################
##########################
####  配列テスト     #####
##########################


$num = 3
$i = 0
$j = 1

####正解文字列を作成する


function ans_str {
    while($true){
        $random = Get-Random -Minimum 1 -Maximum 4
        if ($random -eq 1){
            $msg = $msg + "A"
        } elseif ($random -eq 2) {
            $msg = $msg + "B"
        } elseif ($random -eq 3) {
            $msg = $msg + "C"
        }
        if($i -eq 2){
            return $msg
            break
        }
        $i += 1
    }
}


#####入力文字列作成処理
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


####################
#####メイン処理########
while($true) {
    $ans_str = ans_str
    $input = str_input
    if($ans_str -eq $input){
        Write-Host("${j}回目で文字列がそろって正解です")
        break
    } else {
        Write-Host("${j}回目、不正解です")
        $j++
    }
}


