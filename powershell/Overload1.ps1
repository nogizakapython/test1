class Testclass1 {
    #int型
    [int] $iData
    #String型
    [string] $strData

    #数値を加算する
    [int] Add([int] $Indata) {
        $this.iData += $Indata
        return $this.iData
    }
    #文字列を追加する
    [string] Add ( [string] $Indata ) {
        $this.strData += $Indata
        return $this.strData
    }
}

#インスタンス化
$TestObject1 = New-Object TestClass1

#数値計算
$TestObject1.Add(10)
$TestObject1.Add(20)

#文字列操作
$TestObject1.Add("This is ")
$TestObject1.Add("Mukai Shutoku.")

