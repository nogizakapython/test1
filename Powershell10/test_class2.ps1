#######  クラスの定義スクリプト
#######  Create Date    2021/8/23
#######  Create Author  T.HATTORI


#### Class名Test1の定義
class Test1 {
    [string]$Brand
    [string]$Model
    [int]$cost
}

###インスタンスの生成
$test = [Test1]::new()
###インスタンス変数を呼び出す
$test.Brand = "Apple"
$test.Model = "Mac pro 15 inch"
$test.cost = 150000
### インスタンス変数の表示
$test