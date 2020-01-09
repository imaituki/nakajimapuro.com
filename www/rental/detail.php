<?php
//-------------------------------------------------------------------
// 作成日：2020/01/08
// 作成者：iw
// 内  容：rental
//-------------------------------------------------------------------
//----------------------------------------
//  共通設定
//----------------------------------------
require "./config.ini";

// id確認
if( empty( $arr_get["id"] ) ){
	header( "Location: ./" );
	exit;
}


//----------------------------------------
//  データ取得
//----------------------------------------
// 操作クラス
$objManage = new DB_manage( _DNS );
$objRental = new FT_rental( $objManage );

// データ取得
$mst_rental = $objRental->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage );
unset( $objRental );

if( !empty( $mst_rental["id_rental"] ) ){
	
	// タイトル
	$_HTML_HEADER["title"] = $mst_rental["name"] . "のレンタル";
	
	//----------------------------------------
	//  smarty設定
	//----------------------------------------
	$smarty = new MySmarty("front");
	$smarty->compile_dir .= "rental/";
	
	//テンプレートに設定
	$smarty->assign( "data"   , $mst_rental  );
	
	// オプション設定
	$smarty->assign( "OptionRentalCategory", $OptionRentalCategory );
	
	// 表示
	$smarty->display("detail.tpl");

}else{
	header( "Location: ./" );
exit;
}

?>