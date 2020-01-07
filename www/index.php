<?php
//-------------------------------------------------------------------
// 作成日：2019/10/11
// 作成者：岡田
// 内  容：rental
//-------------------------------------------------------------------
header("Location: /rental/");
exit;

//----------------------------------------
//  共通設定
//----------------------------------------
require "./config.ini";

//----------------------------------------
//  データ取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objRental      = new FT_rental( $objManage );

// 検索条件
$search["page"] = ( empty( $arr_get["page"] ) ) ? 1 : $arr_get["page"];
$search["search_rental_category"] = ( empty( $arr_get["rid"] ) ) ? "" : $arr_get["rid"];

// データ取得
$mst_rental = $objRental->GetSearchList( $search );

// クラス削除
unset( $objRental );
unset( $objManage      );


//----------------------------------------
//  smarty設定
//----------------------------------------
$smarty = new MySmarty("front");
$smarty->compile_dir .= "rental/";

//テンプレートに設定
$smarty->assign( "page_navi"    , $t_rental["page"] );
$smarty->assign( "mst_rental"   , $mst_rental["data"] );
$smarty->assign( "message"      , $message          );

// オプション設定
$smarty->assign( "OptionRentalCategory", $OptionRentalCategory );

// 表示
$smarty->display("index.tpl");

?>
