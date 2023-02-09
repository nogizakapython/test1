class Test2
{
    [int] $NUM
    [int] Add([int] $Indata){
        $this.NUM += $Indata

        #内部データ
        return $this.NUM
    }
}

#インスタンス化
$TestObject2 = New-Object Test2

#10 を加算
$TestObject2.Add(10)
#30を加算
$TestObject2.Add(30)

