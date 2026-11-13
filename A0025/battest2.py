import requests
from bs4 import BeautifulSoup

url = 'https://www.batj.com/media'

# ブラウザからのアクセスに見せかけるヘッダーを追加
headers = {
    'User-Agent': (
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ' (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
    )
}

response = requests.get(url, headers=headers)
response.encoding = response.apparent_encoding  # 文字化け対策

# ステータスコードの確認（200なら成功）
print(f'Status Code: {response.status_code}')

soup = BeautifulSoup(response.text, 'html.parser')
titles = soup.find_all('li')

print(f'取得したliタグの数: {len(titles)}')

with open('battest2.txt', 'w', encoding='utf-8') as f:
  for title in titles:
    # strip=True で前後の空白や改行をきれいに削除
    text = title.get_text(strip=True)
    if text:
      print(text, file=f)