<?php
//-------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： お知らせ 一覧表示
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  カレンダーの作成
//----------------------------------------
// カレンダー情報設定
if( !empty( $_GET ) && is_numeric( $_GET["y"] ) && is_numeric( $_GET["m"] ) ) {
	$year  = date( "Y", mktime( 0, 0, 0, $_GET["m"], 1, $_GET["y"] ) );
	$month = date( "m", mktime( 0, 0, 0, $_GET["m"], 1, $_GET["y"] ) );
}else{
	$year  = date( "Y" );
	$month = date( "m" );
}
$date = 1;

$mst_calendar["display_date"] = date( "Y/m/d", mktime( 0, 0, 0, $month, $date, $year ) );

$mst_calendar["minday"]   = 1;
$mst_calendar["maxday"]   = date( "t", strtotime( $mst_calendar["display_date"] ) );

// カレンダー配列の作成
for ( $i = 1; $i <= $mst_calendar["maxday"]; $i++ ) { 
	$mst_calendar["days"][$i] = date( "w", mktime( 0, 0, 0, $month, $i, $year ) );
}

// カレンダー情報
$mst_calendar["calendar"]     = $calendar;
$mst_calendar["next_date"]    = date( "Y/m/d", strtotime( "+1 month", strtotime( $mst_calendar["display_date"] ) ) );
$mst_calendar["back_date"]    = date( "Y/m/d", strtotime( "-1 month", strtotime( $mst_calendar["display_date"] ) ) );

//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage = new DB_manage( _DNS,1 );
$objRental = new AD_rental( $objManage );

// データ取得
$OptionStoreRental = $objRental->GetOptionParts( "option" );

// 検索月の設定
$arr_post["search_date_start"] = date( "Y/m/01", strtotime( $mst_calendar["display_date"] ) );
$arr_post["search_date_end"]   = date( "Y/m/t", strtotime( $mst_calendar["display_date"] ) );

// データ取得
$tmp_rental = $objRental->GetOptionParts( null, $arr_post );

// クラス削除
unset( $objManage    );
unset( $objRental   );

// 一覧用に生成
if( !empty( $tmp_request ) && is_array( $tmp_request ) ){
	// 整形用foreach
	foreach( $tmp_request as $key => $val ) {
		// 貸出開始日が表示月より前の場合
		if( $val["date_start"] < date( "Y-m-01", strtotime( $mst_calendar["display_date"] ) ) ){
			$tmp_request[$key]["date_start"] = date( "Y-m-01", strtotime( $mst_calendar["display_date"] ) );
		}
		
		// 貸出終了日が表示月より後の場合
		if( $val["date_end"] > date( "Y-m-t", strtotime( $mst_calendar["display_date"] ) ) ){
			$tmp_request[$key]["date_end"] = date( "Y-m-t", strtotime( $mst_calendar["display_date"] ) );
		}
		if( !empty( $val["equipment_arr"] ) ) {
			$tmp_request[$key]["equipment_arr"] = explode( ",", $val["equipment_arr"] );
		}
		if( !empty( $val["equipment_num"] ) ) {
			$tmp_request[$key]["equipment_num"] = explode( ",", $val["equipment_num"] );
		}
		if( !empty( $val["equipment_shop"] ) ) {
			$tmp_request[$key]["equipment_shop"] = explode( ",", $val["equipment_shop"] );
		}
	}
	
	$i = 0;
	// 配列作成用foreach
	foreach( $tmp_request as $key => $val ){
		// 貸出期間計算
		$val["date_diff"] = ( strtotime( $val["date_end"] ) - strtotime( $val["date_start"] ) ) / ( 60 * 60 * 24 ) + 1;
		// カラーバー用
		if( $key != 0 && $tmp_request[$key]["id_request"] != $tmp_request[$key-1]["id_request"] ){
			$i++;
		}
		$val["colorbar"] = $i;

		foreach ( $val["equipment_arr"] as $key2 => $val2 ) {
			$val["_equipment_arr"]      = $val2;
			$val["_equipment_num"]      = $val["equipment_num"][$key2];
			$val["_equipment_shop"]     = $val["equipment_shop"][$key2];
			$mst_calendar["calendar"][] = $val;
		}
		
	}
}

//----------------------------------------
// 表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "loan/";

// テンプレートに設定
$smarty->assign( "message"     , $message      );
$smarty->assign( "mst_calendar", $mst_calendar );

// オプション設定
$smarty->assign( "OptionWeek"            , $OptionWeek             );
$smarty->assign( "OptionStoreRental"  , $OptionStoreRental   );

// 表示
$smarty->display("index.tpl");
?>
