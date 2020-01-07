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
$mst_calendar["next_date"]    = date( "Y/m/d", strtotime( "+1 month", strtotime( $mst_calendar["display_date"] ) ) );
$mst_calendar["back_date"]    = date( "Y/m/d", strtotime( "-1 month", strtotime( $mst_calendar["display_date"] ) ) );


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );
$objEstimate = new AD_estimate( $objManage );

// 検索月の設定
$arr_post["search_action_date_start"] = date( "Y/m/01", strtotime( $mst_calendar["display_date"] ) );
$arr_post["search_action_date_end"]   = date( "Y/m/t", strtotime( $mst_calendar["display_date"] ) );

// データ取得
$tmp_estimate  = $objEstimate->GetSearchList( $arr_post, array( "fetch" => _DB_FETCH_ALL ) );

// クラス削除
unset( $objManage  );
unset( $objEstimate );



// 数日の場合の処理
if( !empty( $tmp_estimate ) && is_array( $tmp_estimate ) ){
	foreach ($tmp_estimate as $key => $val) {
		$day = ( strtotime( $val["date_end"] ) - strtotime( $val["date_start"] ) ) / ( 60 * 60 * 24);
		if( $day != 0 ) {
			// 違う日にちだけループ
			for ( $i = 0; $i <= $day ; $i++ ) {
				$val["date_dammy"] = date('Y-m-d', strtotime( $val["date_start"] .  "+ " . $i . " days" ));
				$t_estimate[] = $val;
			}
		} else {

			$val["date_dammy"] = $val["date_start"];
			$t_estimate[] = $val;
		}

	}
}

// カレンダーに組み込み
if( !empty( $t_estimate ) && is_array( $t_estimate ) ){
	foreach ( $mst_calendar["calendar"] as $key => $val ) {
		if( !empty( $t_estimate ) && is_array( $t_estimate ) ) {
			foreach ( $t_estimate as $key2 => $val2 ) {
				if( $key == date( "j", strtotime( $val2["date_dammy"] ) ) ){
					$mst_calendar["calendar"][$key]["calendar"][] = $val2;
				}
			}
		}
	}
}

//----------------------------------------
// 表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "schedule/";

// テンプレートに設定
$smarty->assign( "message"     , $message      );
$smarty->assign( "mst_calendar"  , $mst_calendar   );

// 表示
$smarty->display("index.tpl");
?>
