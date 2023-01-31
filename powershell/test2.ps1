$str1 = "AAA"
$str2 = "BAB"

$array1 = $str1.ToCharArray()
$array2 = $str2.ToCharArray()

$num = 3
$b_cnt = 0
for($i=0;$i -lt $num ; $i++){
    if($array1[$i] -eq $array2[$i]){
        Write-Host("bingo")
        $b_cnt++
    } else {
        Write-Host("ng")
    }
}
Write-Host("${b_cnt}文字正解")
