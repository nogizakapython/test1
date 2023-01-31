##########################
##########################
####  配列テスト     #####
##########################

#　入力の配列を作成する
$input_array = @()

# 正解の配列を作成する。
$ans_array = @();
#　配列数
$num = 3
# 整数値
$ans_num = 0

function input1($random) {
    switch($random){
        1 { $ans_array += "A" }
        2 { $ans_array += "B" }
        3 { $ans_array += "C" }
    }
}
 
for($i=0;$i -lt $num;$i++){
    $random = Get-Random -Minimum 1 -Maximum 3
    input1($random)
}
 
$ans = Read-Host("AからCまでのアルファベット小文字を入力してください")
 
 

