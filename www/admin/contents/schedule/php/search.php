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
$objStudySchedule = new AD_schedule( $objManage );

// データ取得
$t_schedule = $objStudySchedule->GetSearchList( $arr_post );

// クラス削除
unset( $objManage );
unset( $objStudySchedule   );


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "schedule/";

// テンプレートに設定
$smarty->assign( "page_navi"    , $t_schedule["page"] );
$smarty->assign( "t_schedule", $t_schedule["data"] );
$smarty->assign( '_ARR_IMAGE'   , $_ARR_IMAGE            );

// 表示
$smarty->display("list.tpl");

?>
