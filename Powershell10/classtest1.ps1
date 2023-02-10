class Test1 {
    [string] method1() {
        return "Powershell test"
    }
}

$test1 = New-Object Test1

$test1.method1()
