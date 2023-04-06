# クラス定義
class TestClass{
    [string] test(){
        return "Hello PowerShell Class !!"
    }
}

# インスタンス化
$TestObject = New-Object TestClass

echo "メンバー"
$TestObject | Get-Member

echo ""

echo "タイプ"
$TestObject.GetType()