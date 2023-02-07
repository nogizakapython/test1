########   連想配列スクリプト　　########
########   Create  Date 2021/8/27  ######
########   Create  Author T.HATTORI #####


####クラスの定義

class Test1 {
    [String] $name = @('Takao Hattori','服部隆央')
    [String] $mail_address = @('hattori501014@hattori19751014.onmicrosoft.com','hattori_takao@hattori19751014.onmicrosoft.com')
}

#インスタンスを呼び出す
$TestObject = New-Object Test1


#nameを呼び出す
foreach ($line in $TestObject.name){
	Write-Host $line
	Write-Host " "
}

#mail_addressを呼び出す
foreach ($mail in $TestObject.mail_address){
	Write-Host $mail
	Write-Host " "
}



