<?php
//-------------------------------------------------------------------
// 作成日：2020/01/07
// 作成者：iw
// 内  容：rental
//-------------------------------------------------------------------
//----------------------------------------
//  共通設定
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  データ取得
//----------------------------------------
// 操作クラス
$objManage = new DB_manage( _DNS );
$objRental = new FT_rental( $objManage );

// 検索条件
$default_sid = array_keys($OptionRentalCategory);
$search["page"] = ( empty( $arr_get["page"] ) ) ? 1 : $arr_get["page"];
$search["search_category"] = ( empty( $arr_get["sid"] ) ) ? $default_sid[0] : $arr_get["sid"];

// データ取得
$mst_rental = $objRental->GetSearchList( $search,  array( "fetch" => _DB_FETCH_ALL) );

// クラス削除
unset( $objRental );
unset( $objManage );


//----------------------------------------
//  smarty設定
//----------------------------------------
$smarty = new MySmarty("front");
$smarty->compile_dir .= "rental/";

//テンプレートに設定
$smarty->assign( "mst_rental"   , $mst_rental  );

// オプション設定
$smarty->assign( "OptionRentalCategory", $OptionRentalCategory );

// 表示
$smarty->display("index.tpl");

?>