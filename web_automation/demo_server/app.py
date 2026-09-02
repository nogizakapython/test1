# -*- coding: utf-8 -*-
"""
app.py  ─  社内ポータル デモサーバー
──────────────────────────────────────────────────────────
起動方法:  python app.py
           または run_server.bat をダブルクリック

アクセス先: http://localhost:5000

ログイン情報:
  ユーザー名: demo
  パスワード:  training2024

エンドポイント:
  /login          ← ログインページ（フォーム認証）
  /dashboard      ← ダッシュボード（要ログイン）
  /reports        ← レポート一覧（要ログイン・スクレイピング練習用）
  /public/news    ← お知らせ一覧（認証不要・データ収集練習用）
  /logout         ← ログアウト
"""

from flask import Flask, render_template, request, redirect, url_for, session

app = Flask(__name__)
app.secret_key = 'training-demo-secret-key-2024'

# ─── デモ用ユーザー ───────────────────────────────────────────
USERS = {
    'demo': 'training2024',
}

# ─── レポートデータ（スクレイピング練習用） ───────────────────────
REPORTS = [
    {'id': 'R-001', 'title': '月次業務報告 2026年1月',    'status': '承認済',     'date': '2026-01-31', 'author': '田中 太郎'},
    {'id': 'R-002', 'title': '月次業務報告 2026年2月',    'status': '承認済',     'date': '2026-02-28', 'author': '鈴木 花子'},
    {'id': 'R-003', 'title': '月次業務報告 2026年3月',    'status': 'レビュー中', 'date': '2026-03-31', 'author': '田中 太郎'},
    {'id': 'R-004', 'title': '四半期サマリー Q4-2025',    'status': '承認済',     'date': '2025-12-31', 'author': '山田 三郎'},
    {'id': 'R-005', 'title': '年次報告書 2025',           'status': 'ドラフト',   'date': '2026-01-15', 'author': '鈴木 花子'},
    {'id': 'R-006', 'title': 'プロジェクト進捗報告 #12',  'status': '承認済',     'date': '2026-03-15', 'author': '佐藤 次郎'},
    {'id': 'R-007', 'title': 'セキュリティ監査報告 Q1',   'status': 'レビュー中', 'date': '2026-04-01', 'author': '山田 三郎'},
    {'id': 'R-008', 'title': 'コスト分析レポート 2026-Q1','status': 'ドラフト',   'date': '2026-04-05', 'author': '田中 太郎'},
]

# ─── お知らせデータ（認証不要・データ収集練習用） ─────────────────
NEWS = [
    {
        'title': 'GW期間中の業務連絡について',
        'date': '2026-04-08',
        'category': 'お知らせ',
        'body': 'ゴールデンウィーク期間（4/29〜5/6）の業務連絡は原則メールで行います。緊急の場合は直接担当者へ連絡してください。',
    },
    {
        'title': '社内システムメンテナンスのお知らせ',
        'date': '2026-04-05',
        'category': 'システム',
        'body': '4月12日（日）2:00〜6:00の間、社内ポータルのメンテナンスを実施します。この時間帯はログインできません。',
    },
    {
        'title': 'Python研修 第5回A・B 開催のご案内',
        'date': '2026-04-01',
        'category': '研修',
        'body': 'Python×AI研修 第5回A「Web自動化の設計と実装」および第5回B「RPA品質保証と運用」を開催します。参加は任意ですが積極的なご参加をお待ちしています。',
    },
    {
        'title': '新入社員オリエンテーション日程',
        'date': '2026-03-28',
        'category': 'お知らせ',
        'body': '2026年4月入社の新入社員向けオリエンテーションを4月1日（水）9:00より実施します。参加対象者にはメールでご案内しています。',
    },
    {
        'title': '在宅勤務ガイドライン改定のお知らせ',
        'date': '2026-03-20',
        'category': '規程',
        'body': '在宅勤務ガイドラインが4月1日より改定されます。主な変更点は週3日までの在宅勤務推奨、コアタイムの変更です。詳細は添付資料をご確認ください。',
    },
]


# ─── ルーティング ───────────────────────────────────────────────

@app.route('/')
def index():
    if 'user' in session:
        return redirect(url_for('dashboard'))
    return redirect(url_for('login'))


@app.route('/login', methods=['GET', 'POST'])
def login():
    error = None
    if request.method == 'POST':
        username = request.form.get('username', '').strip()
        password = request.form.get('password', '')
        if USERS.get(username) == password:
            session['user'] = username
            return redirect(url_for('dashboard'))
        error = 'ユーザー名またはパスワードが違います'
    return render_template('login.html', error=error)


@app.route('/dashboard')
def dashboard():
    if 'user' not in session:
        return redirect(url_for('login'))
    pending = sum(1 for r in REPORTS if r['status'] in ('レビュー中', 'ドラフト'))
    return render_template('dashboard.html', user=session['user'],
                           total=len(REPORTS), pending=pending)


@app.route('/reports')
def reports():
    if 'user' not in session:
        return redirect(url_for('login'))
    status_filter = request.args.get('status', '')
    filtered = [r for r in REPORTS if not status_filter or r['status'] == status_filter]
    return render_template('reports.html', reports=filtered,
                           status_filter=status_filter, user=session['user'])


@app.route('/public/news')
def public_news():
    """認証不要のお知らせページ（データ収集練習用）"""
    return render_template('public_news.html', news_items=NEWS)


@app.route('/logout')
def logout():
    session.clear()
    return redirect(url_for('login'))


# ─── 起動 ───────────────────────────────────────────────────────

if __name__ == '__main__':
    print("=" * 50)
    print("  社内ポータル デモサーバー 起動中...")
    print("=" * 50)
    print("  URL:      http://localhost:5000")
    print("  ユーザー: demo")
    print("  パスワード: training2024")
    print()
    print("  停止するには Ctrl+C を押してください")
    print("=" * 50)
    app.run(debug=False, host='127.0.0.1', port=5000)
