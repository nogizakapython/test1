# ベースクラス定義
class TestClass34
{
    # 内部データ
    [int] $Data

    # 初期値なしコンストラクタ
    TestClass34(){

        # 内部データに 0 をセット
        $this.Data = 0
    }

    # 初期値ありコンストラクタ(こちらが呼ばれる)
    TestClass34([int]$Indata){

        # 内部データに初期値をセット
        $this.Data = $Indata
    }

    # 内部データに加算して return するメソッド
    [int] Add([int]$Indata){

        # 内部データに加算
        $this.Data += $Indata

        # 内部データ return
        return $this.Data
    }
}

# サブクラスの定義
class TestClass35 : TestClass34{

    # 引数なしコンストラクタ
    TestClass35() : base() {
    }

    # 引数ありコンストラクタ
    TestClass35([int]$Indata) : base([int]$Indata) {
        # 継承元コンストラクタ処理後にこれが実行される
        ([TestClass34]$this).Data = ([TestClass34]$this).Data + $Indata * 2
    }
}

# インスタンス化(ベースクラスのコントラクタ実行後にサブクラスのコンストラクタが実行される)
$TestObject = New-Object TestClass35(10)

# メソッドの実行(ベースクラスのメソッドを使う)
$TestObject.Add(30)

# インスタンス化(ベースクラスのコントラクタ実行後にサブクラスのコンストラクタが実行される)
$T1 = New-Object TestClass34(20)

# メソッドの実行(ベースクラスのメソッドを使う)
$T1.Add(20)
