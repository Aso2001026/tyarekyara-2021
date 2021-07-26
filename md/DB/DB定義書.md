# DB定義書
## ER図
[ER図はこちら]()

# データベース設計図

## t_purchase

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダーID|order_id|bigint(20)|○|○||
|顧客コード|customer_code|varchar(50)||○|○|
|購入日|purchase_date|date||○||
|総額|total_price|int(11)||○||

## t_purchase_detail

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|オーダーID|order_id|bigint(20) |○|○|○|
|商品コード|item_code|int(11)|○|○|○|
|価格|price|int(11)||○||
|数量|num|int(11)||○||

## m_customers

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|顧客コード|customer_code|varchar(50)|○|○||
|パスワード|pass|varchar(50)||○||
|氏名|name|varchar(20)||○||
|郵便番号|postal_code|varchar(15)||○|| 
|住所|address|varchar(100)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|削除フラグ|del_flag|int(1)||○||
|登録日|reg_date|date||○||

## m_category

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|カテゴリID|category_id|int(11)|○|○||
|氏名|name|varchar(20)||○||
|登録日|reg_date|date||○||

## m_items

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|商品コード|item_code|int(11)|○|○||
|商品名|item_name|varchar(50)||○||
|価格|price|int(11)||○||
|カテゴリID|category_id|int(11)||○|○|
|画像ファイル名|image|varchar(200)||○||
|商品詳細証明|detail|varchar(500)||||
|削除フラグ|del_flag|int(1)||○||
|登録日|reg_date|date||○||

## t_questions

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|質問番号|question_code|int(11)|○|○||
|氏名|name|varchar(20)||○||
|電話番号|tel|varchar(20)||○||
|メールアドレス|mail|varchar(100)||○||
|質問内容|question|varchar(500)||○||
|質問内容|solution_flag|int(1)||○||
|質問日|ques_date|date||○||

## t_answers

|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|質問番号|question_code|int(11)|○|○|○|
|回答番号|answer_code|int(11)|○|○||
|担当者ID|employee_code|int(11)||○|○|
|回答内容|answer|varchar(500)||○||
|回答日|ans_date|date||○||

## m_enployees
|和名|属性名(カラム名)|型|PK|NN|FK|
|---|-----|--|--|--|--|
|従業員ID|employee_code|int(11)|○|○||
|氏名|name|varchar(20)||○||
|登録日|reg_date|date||○||
