<?php
//-------------------------------------------------------------------
// 作成日： 2018/03/22
// 作成者： 牧
// 内  容： カレンダーCSV出力
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

// カレンダー配列の作成
while( checkdate( $month, $date, $year ) ){
	// 日付の情報取得
	$day   = $date;
	$week  = (integer)date( "w",mktime( 0, 0, 0, $month, $date, $year ) );
	// 設定
	$calendar[$date]["week"]     = $week;
	$calendar[$date]["calendar"] = NULL;
	$date++;
}

// カレンダー情報
$mst_calendar["calendar"]     = $calendar;
//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objSchedule = new AD_schedule( $objManage );

// 検索月の設定
$arr_post["search_action_date_start"] = date( "Y/m/01", strtotime( $mst_calendar["display_date"] ) );
$arr_post["search_action_date_end"]   = date( "Y/m/t", strtotime( $mst_calendar["display_date"] ) );

// データ取得
$t_schedule = $objSchedule->GetSearchList( $arr_post, array( "fetch" => _DB_FETCH_ALL ) );

// クラス削除
unset( $objManage  );
unset( $objSchedule );

// カレンダーに組み込み
if( !empty( $t_schedule ) && is_array( $t_schedule ) ){
	foreach ( $mst_calendar["calendar"] as $key => $val ) {
		foreach ( $t_schedule as $key2 => $val2 ) {
			if( $key == date( "j", strtotime( $val2["action_date"] ) ) ){
				$mst_calendar["calendar"][$key]["calendar"][] = $val2;
			}
		}
	}
}

// CSV初期値
$data[] = '"日付","","申請者","時間"';


// エクスポート
if( is_array( $mst_calendar["calendar"] ) ) {
	$line_no = 1;
	foreach ( $mst_calendar["calendar"] as $key => $val ) {
		$data[$line_no] = '"' . date( "Y/m/d", mktime( 0, 0, 0, $month, $key, $year ) ) . '",""';
		if( !empty( $val["calendar"] ) ){
			foreach ( $val["calendar"] as $key2 => $val2 ) {
				if( $key2 != 0 ){
					$data[$line_no] = '"",""';
				}
				if( $val2["cancel_flg"] == 1 ) {
					$cancel = "（中止）";
				} else {
					$cancel = "";
				}
				// CSVデータ
				$data[$line_no] .= ',"' . $val2["number"] . "　" . $cancel . $val2["name"] . '","'
									   . $val2["action_time"]                             . '"';
				
				$line_no++;
			}
			
		}
		$line_no++;
	}
}

// CSV出力
if( is_array( $data ) ) {
	// CSVに変換
	$csv = implode( "\r\n", $data );
	// 文字コード変換

	// 出力
	header("Content-Type: application/octet-stream");
	header( 'Content-Disposition: attachment; filename=' . date("Ymd") . '_schedule.csv' );
	echo mb_convert_encoding( $csv, "SJIS", "UTF-8" );
}
?>
