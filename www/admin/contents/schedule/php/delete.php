<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 一括削除
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  削除処理
//----------------------------------------
// 操作クラス
$objManage      = new DB_manage( _DNS );
$objStudySchedule = new AD_schedule( $objManage, $_ARR_IMAGE );

// トランザクション
$objStudySchedule->_DBconn->StartTrans();

// 削除
$res = $objStudySchedule->delete( $arr_post["id"] );

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
	echo json_encode( array( "result" => "false", "message" => "削除するデータを選択してください。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "削除完了しました。<br />" ) );
}

?>
