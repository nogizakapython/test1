class TestClass{
    [string] hoge(){
        return "Hello Powershell"
    }
}

$Test1 = New-Object TestClass

$Test1.hoge()