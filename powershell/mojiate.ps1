##########################
##########################
####  文字当てクイズ  #####
####  新規作成 2023/1/31##
####  修正    2023/2/1  ##
##########################

#文字数の変数定義
$num = 4
#正解文字数の文字連結カウント
$i = 0
#配列の要素位置変数
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
        $msg = Read-Host("A,B,C,D(大文字、小文字は区別なし)の4文字を使ったアルファベット4語を入力してください")
        #文字の中身チェック(正規表現)
        $flag = $msg -match '[A-D][A-D][A-D][A-D]'
        if($flag -eq "True") {
            #文字の長さが4文字がチェックする
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
        #正解の文字列を配列に格納する
        $ans_array = $ans_str.ToCharArray()
        #入力した文字列を配列に格納する
        $inp_array = $input_str.ToCharArray()
        #左から数えて何番目の文字が正解か配列処理でチェックする
        for($k=0;$k -lt $num;$k++){
            if ($ans_array[$k] -eq $inp_array[$k]){
                $p = $k + 1
                Write-Host("左から${p}文字目が正解です")
            }
        }
        $j++
    }
}