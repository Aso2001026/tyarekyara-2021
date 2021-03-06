# DB定義書
## ER図
[ER図はこちら](https://github.com/Aso2001026/tyarekyara-2021/blob/main/md/DB/%E4%BF%AE%E6%AD%A3%E5%BE%8C/ER%E5%9B%B3.md)

*****
<img src="../../../img/DB/AnyPort_ER_var7.png" width="500">

*****

# データベース設計図

## m_countries

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|国コード|country_code|varchar(3)|○|○||
|国名|country_name|varchar(100)||○||
|通貨コード|currency_code|varchar(3)||○||
|通貨名|currency_name|varchar(100)||○||


## m_users

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ユーザーID|user_id|int(12)|○|○||
|ユーザー名|user_name|varchar(30)||○||
|ユーザー画像ファイル名|user_image|varchar(200)||||
|メールアドレス|mail|varchar(100)||○||
|国コード|country_code|varchar(3)||○|○|
|言語コード|language_code|varchar(2)||○|○|
|パスワード|user_pass|varchar(20)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_sCategoryId

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップカテゴリID|sCategory_id|int(12)|○|○||
|カテゴリ名|sCategory_name|varchar(100)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_iCategoryId

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品カテゴリID|iCategory_id|int(12)|○|○||
|カテゴリ名|iCategory_name|varchar(100)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_shop

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○||
|店名|shop_name|varchar(100)||○||
|住所|shop_address|varchar(100)||○||
|店説明|shop_explanation|varchar(1000)||||
|店画像ファイル名|shop_image|varchar(200)||||
|クレジットカードフラグ|credit_flag|int(1)||||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## t_shopCategory

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|ショップカテゴリID|sCategory_id|int(12)|○|○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_shopItems

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ショップID|shop_id|int(12)|○|○|○|
|商品ID|item_id|int(12)|○|○||
|商品名|item_name|varchar(100)||○||
|商品カテゴリID|iCategory_id|int(12)||○|○|
|商品画像ファイル名1|item_image1|varchar(200)||||
|商品画像ファイル名2|item_image2|varchar(200)||||
|商品画像ファイル名3|item_image3|varchar(200)||||
|商品画像ファイル名4|item_image4|varchar(200)||||
|商品画像ファイル名5|item_image5|varchar(200)||||
|商品説明|item_explanation|varchar(500)||||
|単価|item_price|int(30)||○||
|ユーザーID|user_id|int(12)||○|○|
|通貨コード|currency_code|varchar(3)||○|○|
|言語コード|language_code|varchar(2)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## m_situation

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|状況ID|situation_id|int(12)|○|○||
|状況名|situation_name|varchar(100)||○||

## m_language

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|言語コード|language_code|varchar(2)|○|○||
|言語名|language_name|varchar(100)||○||

## m_fixedPhrase

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|定型文ID|fixedphrase_id|int(12)|○|○||
|定型文名|fixedphrase_name|varchar(100)||○||
|定型文|fixedphrase|varchar(500)||○||
|状況ID|situation_id|int(12)||○|○|
|言語コード|language_code|varchar(2)||○|○|

## t_securityInformation

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|治安情報id|sInformation_id|int(12)|○|○||
|治安情報|sInformation|varchar(500)||○||
|発生場所|sInformation_address|varchar(100)||○||
|ユーザーID|user_id|int(12)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||
|いいね(参考になった)|good_count|int(12)||○||

## t_searchHistory

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|ユーザーID|user_id|int(12)|○|○|○|
|履歴ID|searchHistory_id|int(12)|○|○||
|検索ワード|searchWord|varchar(200)||○||
|言語コード|language_code|varchar(2)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## t_bulletinBoard

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|掲示板ID|bulletinBoard_id|int(12)|○|○||
|ユーザーID|user_id|int(12)||○|○|
|掲示板タイトル|bulletinBoard_title|varchar(200)||○||
|言語コード|language_code|varchar(2)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## t_bulletinBoardComment

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|掲示板ID|bulletinBoard_id|int(12)|○|○|○|
|コメントID|comment_id|int(12)|○|○|○|
|ユーザーID|user_id|int(12)||○|○|
|コメント|comment|varchar(200)||○||
|言語コード|language_code|varchar(2)||○|○|
|コメント先ID|commentDestination_id|int(12)||||
|いいね(参考になった)|good_count|int(12)||○||
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||

## t_favorite

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|お気に入りID|favorite_id|int(12)|○|○||
|ユーザーID|user_id|int(12)|○|○|○|
|ショップID|shop_id|int(12)||○|○|
|登録日|reg_date|date||○||
|更新日|upd_date|date||||
|削除日|del_date|date||||
