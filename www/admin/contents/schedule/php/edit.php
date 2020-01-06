<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 編集
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  編集データ取得
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objStudySchedule = new AD_schedule( $objManage );

// データ取得
$_POST = $objStudySchedule->GetIdRow( $arr_get["id"] );

// クラス削除
unset( $objManage      );
unset( $objStudySchedule );


//----------------------------------------
//  表示
//----------------------------------------
if( !empty( $_POST["id_schedule"] ) ) {
	
	// データ加工
	$_POST["display_start"] = ( !empty( $_POST["display_start"] ) ) ? date( "Y/m/d", strtotime( $_POST["display_start"] ) ) : NULL;
	$_POST["display_end"]   = ( !empty( $_POST["display_end"]   ) ) ? date( "Y/m/d", strtotime( $_POST["display_end"]   ) ) : NULL;
	
	// smarty設定
	$smarty = new MySmarty("admin");
	$smarty->compile_dir .= "schedule/";

	// テンプレートに設定
	$smarty->assign( '_ARR_IMAGE', $_ARR_IMAGE );
	
	// 表示
	$smarty->display( "edit.tpl" );

} else {

	// メッセージ保管
	$_SESSION["admin"][_CONTENTS_DIR]["message"]["ng"] = "データの取得に失敗しました。<br />";

	// 表示
	header( "Location: ./index.php" );

}

?>
