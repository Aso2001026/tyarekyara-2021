```uml
@startuml

skinparam class {
    '図の背景
    BackgroundColor Snow
    '図の枠
    BorderColor Black
    'リレーションの色
    ArrowColor Black
}

!define MASTER_MARK_COLOR Orange 
!define TRANSACTION_MARK_COLOR DeepSkyBlue

package "AnyPort" as target_system {
    /'
      マスターテーブルを M、トランザクションを T などで表記
      １文字なら "主" とか "従" まど日本語でも記載可能
     '/

    entity "通貨マスタ" as currency <m_currency> <<M,MASTER_MARK_COLOR>> {
        + currency_code [PK]
        --
        currency_name
    }
    
    entity "国名マスタ" as countries <m_countries> <<M,MASTER_MARK_COLOR>> {
        + country_code [PK]
        --
        country_name
    }
    
    entity "ユーザーマスタ" as users  <m_users> <<M,MASTER_MARK_COLOR>> {
        + user_id[PK]
        --
        user_name
        user_image
        user_name
        tel
        mail
        # country_code [FK]
        # language_code [FK]
        reg_date
        upd_date
        del_date
    }
    
    entity "ログインマスタ" as authorization <m_authorization> <<M,MASTER_MARK_COLOR>> {
        + login_id [PK]
        --
        # user_id [FK]
        user_pass
        reg_date
        upd_date
        del_date
    }
    
    entity "店カテゴリマスタ" as sCategory <m_sCategory> <<M,MASTER_MARK_COLOR>> {
        + sCategory_id [PK]
        --
        sCategory_name
        reg_date
        upd_date
        del_date
    }
    
    entity "商品カテゴリマスタ" as iCategory <m_iCategory> <<M,MASTER_MARK_COLOR>> {
        + iCategory_id [PK]
        --
        iCategory_name
        reg_date
        upd_date
        del_date
    }
    
     entity "タグマスタ" as m_tag <m_tag> <<M,MASTER_MARK_COLOR>> {
        + tag_id [PK]
        --
        tag_name
        reg_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        # sCategory_id [FK]
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "商品マスタ" as item <m_item> <<M,MASTER_MARK_COLOR>> {
        + item_id [PK]
        --
        item_name
        iCategory_id
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        reg_date
        upd_date
        del_date
    }
  }



@enduml
```
