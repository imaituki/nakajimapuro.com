<?php
//-------------------------------------------------------------------
// 作成日：2019/10/11
// 作成者：岡田
// 内  容：トップページ
//-------------------------------------------------------------------

//----------------------------------------
//  共通設定
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  データ取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objRental     = new FT_rental( $objManage );

// データ取得
$mst_rental = $objRental->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage      );
unset( $objRental );

/*if( !empty( $mst_rental["id_rental"] ) ){*/

//----------------------------------------
//  smarty設定
//----------------------------------------
$smarty = new MySmarty("front");
$smarty->compile_dir .= "rental/";

/// テンプレートに設定
$smarty->assign( "mst_rental"            , $mst_rental              );

// オプション設定
$smarty->assign( "OptionRentalsCategory", $OptionRentalCategory );

// 表示
$smarty->display("detail.tpl");
/*
}else{
header( "Location: ./" );
exit;
}
*/
?>
