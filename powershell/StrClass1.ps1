# クラス定義
class StrClass1{
    $name
    
    [string] hoge(){
        return "Hi! Powershell's world"
    }
    [string] hoge($name){
        $this.name = $name
        return "Hi! " + $name 
    }
}

# インスタンス化
$StrObject = New-Object StrClass1

echo "メンバー"
$StrObject | Get-Member


echo "タイプ"
$StrObject.GetType()

$StrObject.hoge()
$StrObject.hoge("nogizakapython")