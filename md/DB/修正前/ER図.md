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
        tel
        mail
        # country_code [FK]
        # language_code [FK]
        reg_date
        upd_date
        del_date
    }
    
     entity "オーナーマスタ" as owner  <m_owner> <<M,MASTER_MARK_COLOR>> {
        + owner_id[PK]
        --
        owner_image
        owner_name
        tel
        mail
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
    
     entity "タグマスタ" as tag <m_tag> <<M,MASTER_MARK_COLOR>> {
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
        # iCategory_id [FK]
    }
    
    entity "店支払い方法マスタ" as shopPayment <m_shopPayment> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK][FK]
        + payment_code [PK][FK]
        --
        reg_date
        upd_date
        del_date
    }
    
    entity "店商品マスタ" as shopItems <m_shopItems> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK][FK]
        + item_id [PK][FK]
        --
        item_image
        item_explanation
        item_price
        # currency_code [FK]
        reg_date
        upd_date
        del_date
    }
    
    entity "状況マスタ" as situation <m_situation> <<M,MASTER_MARK_COLOR>> {
        + situation_id [PK]
        --
        situation_name
    }
    
    entity "言語マスタ" as language <m_language> <<M,MASTER_MARK_COLOR>> {
        + language_code [PK]
        --
        language_name
    }
    
    entity "定型文マスタ" as fixedPhrase <m_fixedPhrase> <<M,MASTER_MARK_COLOR>> {
        + fixedphrase_id　[PK]
        --
        fixedphrase_name
        fixedphrase
        # situation_id  [FK]
        # language_code [FK]
    }
    
    entity "支払い方法マスタ" as payment <m_payment> <<M,MASTER_MARK_COLOR>> {
        + payment_code [PK]
        --
        payment_name
    }
    
    entity "レビューテーブル" as review <t_review> <<T,TRANSACTION_MARK_COLOR>> {
        + review_id [PK]
        --
        review_comment
        # shop_id [FK]
        # item_id [FK]
        # user_id [FK]
        # tag_id [FK]
        review_date
        upd_date
        del_date
        good_count
    }
    
    entity "治安情報テーブル" as securityInformation <t_securityInformation> <<T,TRANSACTION_MARK_COLOR>> {
        + sInformation_id [PK]
        --
        sInformation
        # country_code [FK]
        sInformation_address
        reg_date
        upd_date
        del_date
        good_count
    }
    
    entity "検索履歴テーブル" as searchHistory <t_searchHistory> <<T,TRANSACTION_MARK_COLOR>> {
        + user_id [PK][FK]
        + searchHistory_id [PK]
        --
        searchWord
        reg_date
        upd_date
        del_date
    }
  }

securityInformation   }o-ri-o|   countries
review                }o-le-o|   shop
review                }o-do-o|   item
review                }o-do-o|   tag
review                }o-up-o|   users
fixedPhrase           }o-le-o|   language
fixedPhrase           }o-do-o|   situation
shopItems             }o-do-o|   currency
shopItems             }o-le-o|   shop
shopItems             }o-ri-o|   item
shopPayment           }o-do-o|   shop
shopPayment           }o-up-o|   payment
item                  }o-ri-o|   iCategory
shop                  }o-do-o|   sCategory
shop                  }o-le-o|   owner
authorization         |o-ri-o|   users
users                 }o-up-o|   countries
users                 }o-ri-o|   language    
securityInformation   }o-ri-o|   users  
searchHistory         }o-ri-o|   users

@enduml
```
