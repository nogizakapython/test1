#######  Start-Sleep テストスクリプト
#######  Create Date  2021/8/25
#######  Create Author 乃木坂好きのITエンジニア

## Sleepクラスを定義する
class Sleep {
    [int]$wait=10
    [String]$msg1="START"
    [String]$msg2="END"
}
#インスタンスを呼び出す
$sl = [Sleep]::new()

#wait処理を行う
for($i=0;$i -lt 2;$i++){
    Write-Host $sl.msg1
    Start-Sleep $sl.wait
    Write-Host $sl.msg2
}
