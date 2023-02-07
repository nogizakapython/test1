class Test1 {
    static [string]$name = "Hattori"
    [string] $address;
    [int] $num
    Test1(){
    }
    msg() {
        $this.address = "AAAABBBB"
        Write-Host $this.address
    }
}
#インスタンスを呼び出す
$TestObject = New-Object Test1
#コンストラクタを呼び出す
$TestObject.msg()

