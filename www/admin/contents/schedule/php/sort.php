<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ ソート
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  ソート処理
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objStudySchedule = new AD_schedule( $objManage, $_ARR_IMAGE );

// トランザクション
$objStudySchedule->_DBconn->StartTrans();

// ソート
$res = $objStudySchedule->sort( $arr_post["sort"], "id_schedule" );

// ロールバック
if( $res == false ) {
	$objStudySchedule->_DBconn->RollbackTrans();
}

// コミット
$objStudySchedule->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage );
unset( $objStudySchedule );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "並び順の変更に失敗しました。（F5ボタンを押して一度ページを更新してください）<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "並び順の変更が完了しました。<br />" ) );
}
?>