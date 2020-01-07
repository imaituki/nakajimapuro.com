<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 検索
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  SESSION設定
//----------------------------------------
if( !empty( $arr_post["search_date_start"] ) ) {
	$arr_post["search_date_start"] = date( "Y/m/d", strtotime( $arr_post["search_date_start"] ) );
} else {
	$arr_post["search_date_start"] = null;
}
if( !empty( $arr_post["search_date_end"] ) ) {
	$arr_post["search_date_end"] = date( "Y/m/d", strtotime( $arr_post["search_date_end"] ) );
} else {
	$arr_post["search_date_end"] = null;
}
$_SESSION["admin"][_CONTENTS_DIR]["search"]["POST"] = $arr_post;


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objLoan = new AD_loan( $objManage );

// データ取得
$t_loan = $objLoan->GetSearchList( $arr_post );

// クラス削除
unset( $objManage );
unset( $objLoan   );


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "loan/";

// テンプレートに設定
$smarty->assign( "page_navi"    , $t_loan["page"] );
$smarty->assign( "t_loan", $t_loan["data"] );
$smarty->assign( '_ARR_IMAGE'   , $_ARR_IMAGE            );

// 表示
$smarty->display("list.tpl");

?>
