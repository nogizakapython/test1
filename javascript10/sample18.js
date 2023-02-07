var r = /第[1-9]章/;
var book = 'この本は第10章から第19章まであります。';
if (r.test(book)) {
    window.alert('マッチしました');
}
    else {
        window.alert('マッチしませんでした');
}