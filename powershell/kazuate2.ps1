cls #画面消去
$input_answer=0 #入力を受け取る変数
$answer=0 #回答を入れる変数
$correct_answer=Get-Random -Minimum 1 -Maximum 256 #正解をランダムに選ぶ
$trycount=1 #何回入力したかを数える変数
Write-Host “1から255までの整数の中からランダムに数を決めました。`r`n当ててみてください。” #メッセージを表示する
while ($true){
#正解になるまで無限ループ
$input_answer=Read-Host “回答を入力してください” #回答を入力させて代入する
if ([int]::TryParse($input_answer,[ref]$answer) -eq $false){
#入力を一旦数値に変換する。もし失敗すれば数値以外が入力されていると分かる。その場合はもう一度入力させる
continue #whileの行まで戻る
}
if ($correct_answer -eq $answer){
#正解が入力と等しい場合 -eqは「等しい」
Write-Host “正解です！答えは${correct_answer}でした。`r`n” #${変数名}で変数の内容を埋め込める。「`r`n」で改行できる
break #無限ループから脱出する
}
elseif ($correct_answer -lt $answer){
#正解が入力より小さい場合 -ltは「小さい」
Write-Host “違います。正解はあなたの回答よりも小さい数字です。`r`n”
$trycount++ #入力回数を1つ増やす
}
elseif ($correct_answer -gt $answer){
#正解が入力より大きい場合 -gtは「大きい」
Write-Host “違います。正解はあなたの回答よりも大きい数字です。`r`n”
$trycount++
}
#ここまでが無限ループの中身
}
Write-Host “あなたは${trycount}回目の回答で正解しました。”