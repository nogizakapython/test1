﻿#########################################
########## Powershell  ##################
######### ランダムに配列から文字を表示###
###### 新規作成 2023/2/15          ######
#########################################


$input_ans = 0
$ans = Get-Random -Minimum 0 -Maximum 6
$cnt = 0
$sw = 0
$array1 = @('秋元真夏','白石麻衣','西野七瀬','生田絵梨花','齋藤飛鳥','松村沙友理','桜井玲香')

echo $array1[$ans]
