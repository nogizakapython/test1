```mermaid
flowchart LR

subgraph 利用者
    A[問い合わせ]
    B[回答受領]
end

subgraph サポート
    C[内容確認]
    D[回答作成]
end

A --> C
C --> D
D --> B
```