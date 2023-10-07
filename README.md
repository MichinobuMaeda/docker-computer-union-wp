# Docker image for <https://computer-union.jp>

## 必要なもの

- docker-compose ( included in　[Docker Desktop](https://www.docker.com/products/docker-desktop/) )
- git ( or download zip from <https://github.com/MichinobuMaeda/docker-computer-union-wp> )

## 使い方

```bash
$ git clone git@github.com:MichinobuMaeda/docker-computer-union-wp.git
$ cd docker-computer-union-wp
$ docker-compose up

^C

$ docker-compose start
$ docker-compose stop
$ docker-compose down
```

## ディレクトリの構造

```text
+--- volumes            # created automatically
    +--- db             # --> db:/var/lib/mysql
    +--- wordpress      # --> wordpress:/var/www/html
+--- src                # customised image
        Dockerfile
        php-custom.ini
    docker-compose.yml
    README.md
```

## 本番環境のコンテンツの適用

本番環境から `WordPress.YYYY-MM-DD.xml` をダウンロードする。

- 管理画面
    - ツール
        - エクスポート
            - エクスポートする内容を選択: すべてのコンテンツ

本番環境の `wp-content/themes/twentytwentythree/functions.php` を
`volumes/wordpress/wp-content/themes/twentytwentythree` の下にコピーする。

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
        - 固定ページ
            - サンプルページ と プライバシーポリシー をゴミ箱に移動し、ゴミ箱を空にする。
    - 外観
        - Twenty Twenty-Three が有効でなければ有効化する。
        - それ以外のテーマを削除する。
    - プラグイン
        - 新規追加:
            - Contact Form 7
            - Yoast Duplicate Post
        - 追加したプラグインをすべて有効化する。
        - 不要なプラグインを削除する。
            - Akismet Anti-Spam
            - Hello Dolly
    - ツール
        - インポート
            - WordPress
                - 今すぐインストール
                - インポーターの実行
                    - ファイルを選択: `WordPress.YYYY-MM-DD.xml`
                        - 投稿者の割り当て: それぞれ元と同じログイン名を追加する。
                        - 添付ファイルのインポート: [v] 添付ファイルをダウンロードしてインポートする。 ★インポートの実行ボタンを2回押さないように注意すること!!

    - 設定
        - 一般
            - キャッチフレーズ: 電算労コンピュータ関連労働組合
            - 週の始まり: 日曜日
        - 表示設定
            - ホームページの表示
                - 固定ページ: コンピュータ・ユニオンについて
