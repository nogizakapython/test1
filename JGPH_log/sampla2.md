```mermaid
flowchart TD
    A[開始] --> B{条件分岐}
    B -- Yes --> C[処理 C]
    B -- No --> D[処理 D]
    C --> E[終了]
    D --> E
```