<?php
//-------------------------------------------------------------------
// 作成日： 2019/10/21
// 作成者： 岡田
// 内  容: work 一括削除
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  削除処理
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objWork = new AD_work( $objManage );

// トランザクション
$objWork->_DBconn->StartTrans();

// 削除処理
$res = $objWork->delete( $arr_post["id"] );

// 失敗したらロールバック
if( $res == false ) {
	$objWork->_DBconn->RollbackTrans();
}

// コミット
$objWork->_DBconn->CompleteTrans();

// クラス削除
unset( $objManage  );
unset( $objWork );

// 戻り値
if( $res == false ) {
	echo json_encode( array( "result" => "false", "message" => "削除するデータを選択してください。<br />" ) );
} else {
	echo json_encode( array( "result" => "true", "message" => "削除完了しました。<br />" ) );
}
?>