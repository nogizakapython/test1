﻿######### シャットダウン　Powershellスクリプト　　############
######### 新規作成    2022/9/16          ############
####################################################

function command() {
    Stop-Computer
}

echo "*********START***********"

command
if ($? -eq "True"){
    echo "**********Success**********"
} else {
    echo "**********Failure**********"
}

echo "*********END*************"