# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001026/tyarekyara-2021/blob/main/md/DB/ER%E5%9B%B3.md)

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
|ユーザー画像ファイル名|user_image|varchar(200)||||
|氏名|user_name|varchar(20)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|国コード|country_code|varchar(3)||○|○|
|言語コード|language_code|varchar(2)||○|○|
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

## m_sCategory

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップカテゴリID|sCategory_id|int(12)|○|○||
|カテゴリ名|sCategory_name|varchar(50)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_iCategory

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品カテゴリID|iCategory_id|int(12)|○|○||
|カテゴリ名|iCategory_name|varchar(50)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
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
|ショップカテゴリID|sCategory_id|int(12)||○|○|
|店名|shop_name|varchar(50)||○||
|郵便番号|shop_postal_code|varchar(20)||○||
|住所|shop_address|varchar(100)||○||
|店説明|shop_explanation|varchar(500)||||
|店画像ファイル名|shop_image|varchar(200)||||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_item
|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品ID|item_id|int(12)|○|○||
|商品名|item_name|varchar(50)||○||
|商品カテゴリID|iCategory_id|int(12)||○|○|

## m_shopPayment

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|支払いコード|payment_code|int(12)|○|○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_shopItems

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|商品ID|item_id|int(12)|○|○|○|
|商品画像ファイル名|item_image|varchar(200)||||
|商品説明|item_explanation|varchar(500)||||
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

## m_fixedPhrase

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|定型文ID|fixedphrase_id|int(12)|○|○||
|定型文名|fixedphrase_name|varchar(100)||○||
|定型文|fixedphrase|varchar(500)||○||
|状況ID|situation_id|int(12)||○|○|
|言語コード|language_code|varchar(2)||○|○|

## m_payment

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|支払い方法コード|payment_code|int(12)|○|○||
|支払い方法名|payment_name|varchar(100)||○||]

## t_review

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|レビューid|review_id|int(12)|○|○||
|レビューコメント|review_comment|varchar(500)||○||
|ショップID|shop_id|int(12)||○|○|
|商品ID|item_id|int(12)||○|○|
|ユーザーID|user_id|date||○|○|
|タグID|tag_id|int(12)||○|○|
|レビュー日|review_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||
|いいね|good_count|int(12)||○||


## t_securityInformation

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|治安情報id|sInformation_id|int(12)|○|○||
|治安情報|sInformation|varchar(500)||○||
|国コード|country_code|varchar(3)||○|○|
|発生場所|sInformation_address|varchar(100)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||
|いいね|good_count|int(12)||○||




