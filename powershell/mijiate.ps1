##########################
##########################
####  配列テスト     #####

#文字の入力
$str = Read-Host("文字を入力してください")

#1文字ずつ分割して配列に格納する
$str_array = $str.ToCharArray()

#配列を取り出す
foreach ($msg in $str_array) {
	Write-Host $msg
}