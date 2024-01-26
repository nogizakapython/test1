// クリック回数を0で初期化
let n = 0;
// ハートアイコンの要素を取得
const heart = document.getElementById('heart');
// カウンターの要素を取得
const counter = document.getElementById('counter');
    
// ハートアイコンをクリックしたときの処理
heart.addEventListener('click', () => {
    // カウンターを1増やす
    n++;
    // カウンターが10を超えた場合、ハートを大きくする
      if (n > 10) {
      
        heart.classList.add('large');
      }
      // クリック回数を表示
    counter.textContent = n;
});
