#####クラスの継承処理Powershell ################################
##### Create Date  2021/8/26                   #################
##### Create Author  乃木坂好きのITエンジニア  #################

# スーパークラス定義
class Nogizaka{
    [string] msg(){
        return "乃木坂46"
    }
}

# サブクラス(継承するクラス)定義
class Ikkisei : Nogizaka {
     [string] msg2(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の1期生は10年活動している"
        return $Data
    }
}
class Nikisei : Nogizaka {
     [string] msg3(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の2期生は8年活動している"
        return $Data
    }
}

class Sankisei : Nogizaka {
     [string] msg4(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の3期生は5年活動している"
        return $Data
    }
}


# インスタンス化
$TestObject = New-Object Ikkisei
$TestObject.msg2()
$TestObject = New-Object Nikisei
$TestObject.msg3()
$TestObject = New-Object Sankisei
$TestObject.msg4()
