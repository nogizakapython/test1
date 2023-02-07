class Test {
    [string]$Brand
}

$dev = [Test]::new()
$dev.Brand = "Microsoft"
$dev
