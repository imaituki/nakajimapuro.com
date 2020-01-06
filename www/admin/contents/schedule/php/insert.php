<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 新規登録
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  初期化
//----------------------------------------
$message = NULL;


//----------------------------------------
//  新規登録処理
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objStudySchedule = new AD_schedule( $objManage, $_ARR_IMAGE );

// データ変換
$arr_post = $objStudySchedule->convert( $arr_post );

// データチェック
$message = $objStudySchedule->check( $arr_post, 'insert' );

// エラーチェック
if( empty( $message["ng"] ) ) {

	// トランザクション
	$objStudySchedule->_DBconn->StartTrans();

	// 登録処理
	$res = $objStudySchedule->insert( $arr_post );

	// ロールバック
	if( $res == false ) {
		$objStudySchedule->_DBconn->RollbackTrans();
		$message["ng"]["all"] = _ERRHEAD . "登録処理に失敗しました。（ブラウザの再起動を行って改善されない場合は、システム管理者へご連絡ください。）<br />";
	}

	// コミット
	$objStudySchedule->_DBconn->CompleteTrans();

}

// クラス削除
unset( $objManage );
unset( $objStudySchedule   );

//----------------------------------------
//  表示
//----------------------------------------
if( empty( $message["ng"] ) ) {

	// メッセージ保管
	$_SESSION["admin"][_CONTENTS_DIR]["message"]["ok"] = "登録が完了しました。<br />";

	// 表示
	header( "Location: ./index.php" );

} else {


	// smarty設定
	$smarty = new MySmarty("admin");
	$smarty->compile_dir .= "schedule/";

	// テンプレートに設定
	$smarty->assign( "message"   , $message    );
	$smarty->assign( "arr_post"  , $arr_post   );
	$smarty->assign( '_ARR_IMAGE', $_ARR_IMAGE );

	// 表示
	$smarty->display( "new.tpl" );

}

?>
