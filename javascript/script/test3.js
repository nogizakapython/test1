// 新規作成 2024/1/26

// ボタンの要素を取得
const b1 = document.getElementById('sample1');

// クリック回数を0で初期化
let n = 0;

// カウンターの要素を取得
const test1 = document.getElementById('test1');
const test2 = document.getElementById('test2');
// ハートアイコンをクリックしたときの処理
const msg1 = "END"



b1.addEventListener('click', () => {
  // カウンターを1増やす
  try {
    n++;
    if (n == 10 ){ 
      test2.textContent = "10回";
    }
    else if (n == 20){
      test2.textContent = "20回";
      
    } else if (n > 20){
      test2.textContent = "20回を超えてクリックはできません";
      test1.textContent = msg1;
      throw new Error();
    }
    // クリック回数を表示
    test1.textContent = n;
   
  }catch(e){
    alert("処理を終了します。");
  }  
});
