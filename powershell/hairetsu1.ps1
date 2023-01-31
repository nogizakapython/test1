##########################
##########################
####  配列テスト     #####


# 空の配列を作成する。
$test_array = @();
 
for($i=0;$i -lt 3;$i++){
    $random = Get-Random -Minimum 1 -Maximum 5
    $test_array += $random
}
 
 
 
# foreach でループしてみる。
foreach($var in $test_array){
  Write-Host $var;
}
 
# for でループしてみる。
for ($i=0; $i -lt $test_array.Count; $i++){
  Write-Output ('インデックス：' + $i + ' → 値：' + $test_array[$i])
} 
