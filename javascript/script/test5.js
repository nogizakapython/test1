    // タブのリンク要素を取得
    const tabs = document.querySelectorAll('.tabs li a');
    // コンテンツの要素を取得
    const contents = document.querySelectorAll('.content');
    
    // すべてのタブ要素に対して処理を実行
    tabs.forEach(clickedItem => {
      // タブがクリックされたときの処理
      clickedItem.addEventListener('click', e => {
        // リンクによるページ遷移を抑制
        e.preventDefault();
        
        // いったんすべてのタブを非アクティブにする
        tabs.forEach(item => {
          item.classList.remove('active');
        });
        // クリックされたタブだけアクティブにする
        clickedItem.classList.add('active');

        // いったんすべてのコンテンツ要素を非アクティブにする
        contents.forEach(content => {
          content.classList.remove('active');
        });
        // クリックされたタブに対応するコンテンツ要素だけアクティブにする
        document.getElementById(clickedItem.dataset.id).classList.add('active');
      });
    });
