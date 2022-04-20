# Docker image for computer-union.jp

## Local development

```
$ git clone git@github.com:MichinobuMaeda/docker-computer-union-wp.git
$ cd docker-computer-union-wp
$ docker-compose up
```

## Applying production contents

https://computer-union.jp/wp-admin/

- 管理画面
    - ツール
        - エクスポート
            - すべてのコンテンツ

ダウンロードしたファイル WordPress.YYYY-MM-DD.xml を後の手順で使う。

http://localhost:8080/

- インストール
    - 言語: 日本語
    - 必要情報
        - サイトのタイトル: コンピュータ・ユニオン
        - ユーザ名: admin
        - パスワード: password
        - パスワード確認: [v] 脆弱なパスワードの使用を確認
        - メールアドレス: admin@example.com
- 管理画面
    - 投稿
        - 一覧
            - Hello world! をゴミ箱に移動
    - 外観
        - 新規追加: Square
        - 追加したテーマを有効化する。
    - プラグイン
        - 新規追加:
            - Contact Form 7
            - Export All URLs
            - Redirection
            - Yoast Duplicate Post
        - 追加したプラグインをすべて有効化する。
    - 設定
        - 一般
            - キャッチフレーズ: 電算労コンピュータ関連労働組合
            - 週の始まり: 日曜日
    - ツール
        - インポート
            - WordPress
                - 今すぐインストール
                - インポーターの実行
                    - ファイルを選択: WordPress.YYYY-MM-DD.xml
                        - 投稿者の割り当て: それぞれ元と同じログイン名を追加する。
                        - 添付ファイルのインポート: [v] 添付ファイルをダウンロードしてインポートする
    - 外観
        - カスタマイズ
            - ホームページ設定
                - 固定ページ: コンピュータ・ユニオンについて
            - General Settings
                - Header Settings
                    - 画像を変更:
                        - メディアライブラリ: ENIACtrim3.jpg
                - Blog Settings
                    - Full Content
                    - [v] Disable Share Buttons
                - 色: #3f9b98
            - メニュー
                - topmenu
                    - [v] Primary Menu
        - ウィジット
            - Right Sidebar の既定の内容を削除して本番サイトからコピーする

