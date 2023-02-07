var n = window.prompt('名字を１つ入力してください');
switch (n) {
    case '佐藤' :
        window.alert('日本で1番多い名字ですね');　//処理1
        break;
    case '鈴木' :
        window.alert('佐藤さんの次に多い名字ですね');　　//処理2
        break;
    case '高橋' :
        window.alert('ベスト3にランクインしていますね');  //処理3
        break;
    default :
        window.alert('結構珍しい名字ですね');　　　//処理4
}