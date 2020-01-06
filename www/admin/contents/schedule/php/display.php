<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 一括表示切替
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  表示切替
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objStudySchedule = new AD_schedule( $objManage );

// トランザクション
$objStudySchedule->_DBconn->StartTrans();

// 表示切り替え
$res = $objStudySchedule->changeDisplay( $arr_post["id"], $arr_post["display_flg"] );

// ロールバック
if( $res == false ) {
	$objStudySchedule->_DBconn->RollbackTrans();
}

// コミット
$objStudySchedule->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage );
unset( $objStudySchedule   );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "表示切り替えに失敗しました。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "表示切り替え完了しました。<br />" ) );
}

?>
