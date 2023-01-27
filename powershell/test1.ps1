#########################################
########## Powershell  ##################
######### 1から10までの数字を当てる######
#########################################



function read(){
    $input = Read-Host("1から10までの整数を入力してください")
    return $input
}
$ans = Get-Random -Minimum 1 -Maximum 10
$input1 = 0
$cnt = 0
$sw = 0

while ($cnt -lt 3){
    $input1 = read    
    if ($input1 -lt 1 -and $input1 -gt 10)  {
        Write-Host "1から10までの整数を入力してください"
    } else {
       $cnt++
       if($input1 -eq $ans){
            Write-Host("${cnt}回目で正解です")
            break
       } else {
            Write-Host("不正解です")
            if ($cnt -eq 3){
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