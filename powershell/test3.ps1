# 正解の配列を作成する。

$num = 3
$ans_array = @()
$random = 1


#####正解文字列作成処理 
function answer {
    for($i=0;$i -lt $num;$i++){
        $random = Get-Random -Minimum 1 -Maximum 3
        Write-Host($random)
        if($random -eq "1"){
            $ans_array = $ans_array + "A"
        } elseif ($random -eq "2"){
            $ans_array = $ans_array + "B"
        } elseif ($random -eq "3"){
            $ans_array = $ans_array + "C"
        }
    }
}

answer
foreach($str in $ans_array){
    Write-Host($str)
}
