# お問い合わせフォーム

## 環境構築

### Dockerビルド

- リポジトリをクローンします:
  ```bash
  git clone git@github.com:shun1019/confirmation-test.git
  ```
- Dockerコンテナをビルドして起動します:
  ```bash
  docker-compose up -d --build
  ```
- MySQLは、OSによって起動しない場合があるため、それぞれのPCに合わせて `docker-compose.yml` ファイルを編集してください。

### Laravel環境構築

- コンテナ内に入ります:
  ```bash
  docker-compose exec php bash
  ```
- Composerで依存関係をインストールします:
  ```bash
  composer install
  ```
- `.env.example` ファイルから `.env` を作成し、環境変数を変更します:
  ```bash
  cp .env.example .env
  ```
- アプリケーションキーを生成します:
  ```bash
  php artisan key:generate
  ```
- データベースマイグレーションを実行します:
  ```bash
  php artisan migrate
  ```
- データベースシーディングを実行します:
  ```bash
  php artisan db:seed
  ```

## 使用技術

- PHP: 7.4.9
- Laravel: 8.83.8
- MySQL: 8.0
- Docker: コンテナ管理
- Docker version 27.1.1

## URL

- 開発環境: [http://localhost/](http://localhost/)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)

## データベースの初期データ

- `categories` テーブルには以下の5件のデータが作成されます:
  - 商品のお届けについて
  - 商品交換について
  - 商品トラブル
  - ショップへのお問い合わせ
  - その他

- `contacts` テーブルにはファクトリを使用して35件のダミーデータが作成されます。

## ファイルとディレクトリ構成

- `database/seeders`:
  - `CategoriesTableSeeder.php`: `categories` テーブルに初期データを挿入するシーダー
  - `ContactsTableSeeder.php`: `contacts` テーブルにダミーデータを挿入するシーダー

- `database/factories`:
  - `ContactFactory.php`: `contacts` テーブルのダミーデータを生成するファクトリ
