# Docker image for <https://computer-union.jp>

## Prerequisites

- docker-compose ( included in　[Docker Desktop](https://www.docker.com/products/docker-desktop/) )
- git ( or download zip from <https://github.com/MichinobuMaeda/docker-computer-union-wp> )

## Usage

```bash
$ git clone git@github.com:MichinobuMaeda/docker-computer-union-wp.git
$ cd docker-computer-union-wp
$ docker-compose up

^C

$ docker-compose start
$ docker-compose stop
$ docker-compose down
```

## Directories and files

```text
+--- volumes            # created automatically
    +--- db             # --> db:/var/lib/mysql
    +--- wordpress      # --> wordpress:/var/www/html
+--- wordpress          # customised image
        Dockerfile
        php-custom.ini
    docker-compose.yml
    README.md
```

## Applying production contents

Download ``WordPress.YYYY-MM-DD.xml``.

<https://computer-union.jp/wp-admin/>

- 管理画面
    - ツール
        - エクスポート
            - すべてのコンテンツ

Brefore uploading ``WordPress.YYYY-MM-DD.xml``.

<http://localhost:8080/>

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
            - Hello world! をゴミ箱に移動し、ゴミ箱を空にする。
    - 外観
        - 新規追加: Square
        - 追加したテーマを有効化する。
    - プラグイン
        - 新規追加:
            - Contact Form 7
            - Yoast Duplicate Post
        - 追加したプラグインをすべて有効化する。

Upload ``WordPress.YYYY-MM-DD.xml``.

<http://localhost:8080/>

- 管理画面
    - ツール
        - インポート
            - WordPress
                - 今すぐインストール
                - インポーターの実行
                    - ファイルを選択: ``WordPress.YYYY-MM-DD.xml``
                        - 投稿者の割り当て: それぞれ元と同じログイン名を追加する。
                        - 添付ファイルのインポート: [v] 添付ファイルをダウンロードしてインポートする

★インポートの実行ボタンを2回押さないように注意すること!!

After uploading ``WordPress.YYYY-MM-DD.xml``.

子テーマをコピーする。

```bash
scp -r cu:/home/ccu/computer-union.jp/public_html/wp-content/themes/square-child volumes/wordpress/wp-content/themes/
```

<http://localhost:8080/>

- 管理画面
    - 設定
        - 一般
            - キャッチフレーズ: 電算労コンピュータ関連労働組合
            - 週の始まり: 日曜日
    - 外観
        - テーマ
            - "Square Child" を有効にする
        - カスタマイズ
            - ホームページ設定
                - 固定ページ: コンピュータ・ユニオンについて
            - General Settings
                - Site Logo, Title & Tagline
                    - サイトアイコン
                        - cropped-cu_logo_512.png
                - Header Settings
                    - 画像を変更:
                        - メディアライブラリ: ENIACtrim3.jpg
                - Blog Settings
                    - Full Content
                    - [v] Disable Share Buttons
            - 色: #3f9b98
            - メニュー
                - topmenu
                    - メニューの位置
                        - [v] Primary Menu
            - ウィジェット ★ここではなく上のレベルの「ウィジェット」を編集する。
        - ウィジェット
            - Right Sidebar の既定の内容を削除して本番サイトからコピーする
    - 固定ページ
        - コンピュータ・ユニオンについて
            - 「しごと情報」と「ブログ」のカテゴリーを設定し直す。
