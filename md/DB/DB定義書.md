# DB定義書
## ER図
[ER図はこちら]()

# データベース設計図

## m_countries

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|国コード|country_code|varchar(3)|○|○||
|国名|country_name|varchar(50)||○||

## m_users

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ユーザーID|user_id|int(12)|○|○||
|ユーザー名|user_name|varchar(20)||○||
|ユーザー画像ファイル名|user_image|varchar(200)||○||
|氏名|name|varchar(20)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_authorization

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ログインID|login_id|int(12)|○|○||
|ユーザーID|user_id|int(12)||○|○|
|パスワード|pass|varchar(20)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||

## m_category

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|カテゴリID|category_id|int(12)|○|○||
|カテゴリ名|category_name|varchar(50)||○||
|登録日|reg_date|date||○||
|削除日|del_date|date||||

## m_tag

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|タグID|tag_id|int(12)|○|○||
|タグ名|tag_name|varchar(50)||○||
|登録日|reg_date|date||○||
|削除日|del_date|date||||

## m_shop

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○||
|店名|shop_name|varchar(50)||○||
|郵便番号|shop_postal_code|varchar(20)||○||
|住所|shop_address|varchar(100)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||


