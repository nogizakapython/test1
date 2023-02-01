$msg = Read-Host("文字を入力してください")

$msg2 = $msg.ToCharArray()
$num = $msg2.Count

for($i=0;$i -lt $num;$i++){
    echo $msg2[$i]
}

