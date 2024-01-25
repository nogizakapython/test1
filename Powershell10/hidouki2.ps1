# 開始時間の表示
Get-Date
# バックグラウンドで動かすジョブ
$function1 = {
 Start-Sleep 10
 write-host "function1終了"
}
function function2() {
 Start-Sleep 10
 write-host "function2終了"
}

# バックグラウンドジョブ
$job1 = Start-Job -ScriptBlock $function1
# 関数２を呼び出して10秒スリープ
function2
# バックグラウンドジョブ終了まで待ちます
Wait-Job $job1.Id
# 終了時間の表示
Get-Date