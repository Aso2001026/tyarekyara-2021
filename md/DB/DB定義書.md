# DB定義書
## ER図
[ER図はこちら]()

# データベース設計図

## m_currency

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|通貨コード|currency_code|varchar(3)|○|○||
|通貨名|currency_name|varchar(20)||○||


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
|パスワード|user_pass|varchar(20)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

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

## m_item
|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品ID|item_id|int(12)|○|○||
|商品名|shop_name|varchar(50)||○||


## m_shopCategry

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|カテゴリーID|category_id|int(12)|○|○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_shopItems

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|商品ID|item_id|int(12)|○|○|○|
|単価|item_price|int(30)||○||
|通貨コード|currency_code|varchar(3)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_situation

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|状況ID|situation_id|int(12)|○|○||
|状況名|situation_name|varchar(50)||○||

## m_language

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|言語コード|language_code|varchar(2)|○|○||
|言語名|language_name|varchar(50)||○||

## t_review

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|レビューid|review_id|int(12)|○|○||
|レビューコメント|review_comment|varchar(500)||○||
|ショップID|shop_id|int(12)||○|○|
|商品ID|item_id|int(12)||○|○|
|ユーザーID|user_id|date||○|○|
|レビュー日|review_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||
|いいね|good_count|int(12)||○||

## m_fixedPhrase

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|定型文ID|fixedphrase_id|int(12)|○|○||
|定型文名|fixedphrase_name|varchar(100)||○||
|定型文|fixedphrase|varchar(500)||○||
|状況ID|situation_id|int(12)||○|○|
|言語コード|language_code|varchar(2)||○|○|
