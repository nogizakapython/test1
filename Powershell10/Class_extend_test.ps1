#####クラスの継承処理Powershell


# ベースクラス(元となるクラス)定義
class TestClass1{
    [string] msg(){
        return "Hello Powershell!"
    }
}

# サブクラス(継承するクラス)定義
class TestClass2 : TestClass1 {
    [string] msg2(){
        $Data = ([TestClass1]$this).msg()
        $Data += "Powershell is modern Script at all the world !!"
        return $Data
    }
}

# インスタンス化
$TestObject = New-Object TestClass2

# メソッドの実行
$TestObject.msg2()