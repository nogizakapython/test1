#########################################
########## Powershell  ##################
######### 1から30までの数字を当てる######
###### 新規作成 2023/1/27          ######
#########################################


$input_ans = 0
$ans = Get-Random -Minimum 1 -Maximum 30
$cnt = 0
$sw = 0
#画面を綺麗にする
cls

while ($cnt -lt 5){
    $input1 = Read-Host("1から30までの整数を入力してください")
    #入力を一旦数値に変換する。もし失敗すれば数値以外が入力されていると分かる。その場合はもう一度入力させる
    if ([int]::TryParse($input1,[ref]$input_ans) -eq $false){
        Write-Host "整数以外を入力しないでください"
        #whileの行まで戻る
        continue
    }   
    if ($input_ans -lt 1 -or $input_ans -gt 30)  {
        Write-Host "1から30までの整数を入力してください"
        #whileの行まで戻る
        continue
    } else {
       $cnt++
       if($input_ans -eq $ans){
            Write-Host("${cnt}回目で正解です")
            break
       } else {
            if($input_ans -lt $ans){
                Write-Host "入力した整数は正解の整数より小さいです"
            } else {
                Write-Host "入力した整数は正解の整数より大きいです"
            }                     
            if ($cnt -eq 5){
                $sw = 1
                Write-Host("${cnt}回不正解でした")
                break
            } 
       }
    }
}        

if($sw = 1){
    Write-Host("正解は${ans}です")
}