#　クラスの継承とオーバーロード
# 新規作成 2023/4/6

# 大元クラス
class BaseClass{
    [String] $str = ""

    [String] BaseMethod([String] $input){
        return $this.str + $input
    }
}

# 大元クラスを継承した中間継承クラス
class MiddleClass : BaseClass{

    [String] $b 

    [String] MiddleMethod() {
        $this.b = "シークレットメンバーです"
        return $this.b
    }

    [String] MiddleMethod([String] $input){
        if ($input.Length -eq 0) {
            $this.b = "匿名"
        }
        return $this.str + $this.b + $input
    }
    [String] MethodA([String] $input){
        [String] $d = ([BaseClass]$this).BaseMethod( $input) + $input
        return $d
    }

}

# 中間継承クラスを継承した末端クラス
class SubClass : MiddleClass{
    [String] $x
    [String] SubMethod([String] $input){
        # 大元クラスのメソッドだけど、中間継承クラスのメソッドとして呼び出せる
        [String]$c = ([MiddleClass]$this).BaseMethod( $input ) + $input
        return $c
    }
    [String] MethodB([String] $input){
        if ($input.Length -eq 0) {
            $this.x = "匿名ユーザーです"
        }
        return $this.str + $this.x + $input
    }

}

# 末端クラスを呼び出す
$TestObject = New-Object SubClass
$TestObject.SubMethod("西野七瀬")
$TestObject.MethodB("小坂菜緒")
$TestObject.MethodB("")
$TestObject.MiddleMethod()


# ミドルクラスを呼び出す
$TestObject1 = New-Object MiddleClass
$TestObject1.MiddleMethod("秋元真夏")
$TestObject1.MethodA("白石麻衣")
$TestObject1.MiddleMethod("")
$TestObject1.MiddleMethod()



