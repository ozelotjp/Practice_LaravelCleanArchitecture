# LaravelCleanArchitecture

LaravelでCleanArchitectureを実現する実装を試している、勉強用レポジトリです。

CleanArchitectureのコードは */app/Http/Controllers/* と */package* にあります。

## Operating Environments

|         | Version | Release    | Bug fix    | Security fix |
| ------- | ------- | ---------- | ---------- | ------------ |
| PHP     | 7.4     | 2019/11/28 | 2021/11/28 | 2022/11/28   |
| Laravel | 8.0     | 2020-09-08 | 2021-03-08 | 2021-09-08   |

## How to develop

- 予めDockerをインストールしてください。
- `docker-compose up -d --build` で起動します。
- `docker-compose exec php sh` でPHPコンテナにアクセスします。
  - `composer install` でパッケージをインストールします。
  - `cp .env.example .env` でenvファイルを複製します。
  - `php artisan key:generate` で *APP_KEY* を設定します。
  - `php artisan migrate` でDBを初期化します。
  - `php artisan ide-helper:generate && php artisan ide-helper:meta && php artisan ide-helper:eloquent` でIDE用のファイルとコードを生成します。なお *ide-helper:model* はすでに完了しているので、実行する必要はありません。
- http://localhost:8000 にアクセスします。

## Reference

下記のサイトを参考に開発しました。

- [Laravelで実践クリーンアーキテクチャ](https://qiita.com/nrslib/items/aa49d10dd2bcb3110f22)
- [Laravel × Clean Architecture 新規開発中の現場](https://speakerdeck.com/ianbrison/laravel-x-clean-architecture-xin-gui-kai-fa-zhong-falsexian-chang)

