# 開始時間の表示
Get-Date
# バックグラウンドで動かすジョブ
$task1 = {
 Start-Sleep 20
 write-host "task1終了"
}

$task2 = {
 sleep 3
 Write-Host "hogehoge"
 sleep 7
 write-host "task2終了"
}

function function3() {
 Start-Sleep 10
 write-host "function3終了"
}

# バックグラウンドジョブ
$job1 = Start-Job -ScriptBlock $task1
$job2 = Start-Job -ScriptBlock $task2
# 関数２を呼び出して10秒スリープ
function3
# バックグラウンドジョブ終了まで待ちます
Wait-Job $job1.Id
Wait-Job $job2.Id
# 終了時間の表示
Get-Date