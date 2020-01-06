<?php
//----------------------------------------------------------------------------
// 作成日： 2017/12/11
// 作成者： 牧
// 内  容： 申込み操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_schedule {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable    = "t_schedule";
	var $_CtrTablePk  = "id_schedule";
	var $_CtrTable2   = "t_schedule_lecturer";
	var $_CtrTablePk2 = "id_schedule_lecturer";
	var $_CtrTable3   = "t_schedule_ojt";
	var $_CtrTablePk3 = "id_schedule_ojt";

	// コントロール機能（ログ用）
	var $_CtrLogName = "申込み";

	// ファイル操作クラス
	var $_FN_file = null;

	// 画像設定
	var $_ARR_IMAGE = null;

	// ファイル設定
	var $_ARR_FILE = null;

	//-------------------------------------------------------
	// 関数名：__construct
	// 引  数：$dbconn  ： DB接続オブジェクト
	// 戻り値：なし
	// 内  容：コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn, $arrImg = NULL, $arrFile = NULL ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}
		$this->_FN_file = new FN_file();

		// 設定情報
		$this->_ARR_IMAGE = $arrImg;
		$this->_ARR_FILE  = $arrFile;

	}


	//-------------------------------------------------------
	// 関数名：__destruct
	// 引  数：なし
	// 戻り値：なし
	// 内  容：デストラクタ
	//-------------------------------------------------------
	function __destruct() {

	}

	//-------------------------------------------------------
	// 関数名：setImageConfig
	// 引  数：$conf - 画像設定
	// 戻り値：なし
	// 内  容：画像設定の設定を行う。
	//-------------------------------------------------------
	function setImageConfig( $conf ) {
		$this->_ARR_IMAGE = $conf;
	}

	//-------------------------------------------------------
	// 関数名：setFileConfig
	// 引  数：$conf - ファイル設定
	// 戻り値：なし
	// 内  容：ファイル設定の設定を行う。
	//-------------------------------------------------------
	function setFileConfig( $conf ) {
		$this->_ARR_FILE = $conf;
	}

	//-------------------------------------------------------
	// 関数名：convert
	// 引  数：$arrVal
	// 戻り値：データ変換
	// 内  容：データ変換を行う
	//-------------------------------------------------------
	function convert( $arrVal ) {

		// データ変換クラス宣言
		$objInputConvert = new FN_input_convert( $arrVal, "UTF-8" );

		// 変換エントリー
		//$objInputConvert->entryConvert( "url", array( "ENC_KANA" ), "a" );

		// 変換実行
		$objInputConvert->execConvertAll();

		// 戻り値
		return $objInputConvert->GetData();

	}


	//-------------------------------------------------------
	// 関数名：check
	// 引  数：$arrVal
	//       ：$mode - チェックモード（ "insert", "update" ）
	// 戻り値：エラーメッセージ
	// 内  容：データチェック
	//-------------------------------------------------------
	function check( &$arrVal, $mode ) {

		// チェッククラス宣言
		$objInputCheck = new FN_input_check( "UTF-8" );

		// チェックエントリー
	//	$objInputCheck->entryData( "区分"    , "class" , $arrVal["class"] , array( "CHECK_EMPTY" ), null, null );
	//	$objInputCheck->entryData( "受付日"    , "date" , $arrVal["date"] , array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
	//	$objInputCheck->entryData( "受付番号"    , "number" , $arrVal["number"] , array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		$objInputCheck->entryData( "申請者", "name", $arrVal["name"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "申請者　住所（市町村）", "address", $arrVal["address"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "代表者氏名", "representative", $arrVal["representative"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "実施場所", "place", $arrVal["place"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "実施場所　住所（市町村）", "place_address", $arrVal["place_address"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "担当者名", "person", $arrVal["person"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
	//	$objInputCheck->entryData( "担当者名　電話番号", "tel", $arrVal["tel"], array( "CHECK_EMPTY", "CHECK_TEL" ), null, null );
	//	$objInputCheck->entryData( "担当者名　FAX番号", "fax", $arrVal["fax"], array( "CHECK_TEL" ), null, null );
	//	$objInputCheck->entryData( "担当者名　メールアドレス", "mail", $arrVal["mail"], array( "CHECK_MAIL", "CHECK_EMPTY" ), null, null );
	//	$objInputCheck->entryData( "実施希望日時（年月日）", "hope_date", $arrVal["hope_date"], array( "CHECK_EMPTY" ), null, null );
	//	$objInputCheck->entryData( "実施希望日時（時間）", "hope_time", $arrVal["hope_time"], array( "CHECK_EMPTY" ), null, null );

		// チェックエントリー（UPDATE時）
		if( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "申込みID", "all", $arrVal["id_schedule"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		}

		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 取得
		if( ( strcmp( $mode, "update" ) == 0 ) ){
			$chk = $this->_DBconn->_ADODB->GetOne( "select id_schedule from t_schedule where class = " . $arrVal["class"] . " AND number = '" . $arrVal["number"] . "' AND schedule_year = " . $arrVal["schedule_year"] . " AND id_schedule != " . $arrVal["id_schedule"] );
		}else{
			$chk = $this->_DBconn->_ADODB->GetOne( "select id_schedule from t_schedule where class = " . $arrVal["class"] . " AND number = '".$arrVal["number"] ."' AND schedule_year = " . $arrVal["schedule_year"] . " " );
		}


		if( !empty( $chk ) ){
			$res["ng"]["number"] = "受付番号が重複しています。";
		}
		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：insert
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ登録
	//-------------------------------------------------------
	function insert( $arrVal, $arrSql = null ) {

		// アップ処理
		$FileInfo = $this->_FN_file->upFile( $_FILES, $this->_ARR_FILE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 器材生成
		if( !empty( $arrVal["equipment_num"] ) && is_array( $arrVal["equipment_num"] ) ){
			foreach ( $arrVal["equipment_num"] as $key => $val ) {
				if( $val > 0 ){
					$equipment_arr[]  = $key;
					$equipment_num[]  = $val;
					$equipment_shop[] = $arrVal["equipment_shop"][$key];
				}
			}
			$arrVal["equipment_arr"]  = implode( ",", $equipment_arr );
			$arrVal["equipment_num"]  = implode( ",", $equipment_num );
			$arrVal["equipment_shop"] = implode( ",", $equipment_shop );
		}

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：insertlecturer
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ登録（講師）
	//-------------------------------------------------------
	function insertlecturer( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable2, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：insertojt
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ登録（OJT）
	//-------------------------------------------------------
	function insertojt( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable3, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：update
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ更新
	//-------------------------------------------------------
	function update( $arrVal, $arrSql = null ) {

		// ファイル削除
		$this->_FN_file->delFile( $this->_ARR_FILE, $arrVal["_delete_file"], $arrVal );

		// アップ処理
		$FileInfo = $this->_FN_file->upFile( $_FILES, $this->_ARR_FILE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 器材生成
		if( !empty( $arrVal["equipment_num"] ) && is_array( $arrVal["equipment_num"] ) ){
			foreach ( $arrVal["equipment_num"] as $key => $val ) {
				if( $val > 0 ){
					$equipment_arr[]  = $key;
					$equipment_num[]  = $val;
					$equipment_shop[] = $arrVal["equipment_shop"][$key];
				}
			}

			$arrVal["equipment_arr"]  = implode( ",", $equipment_arr );
			$arrVal["equipment_num"]  = implode( ",", $equipment_num );
			$arrVal["equipment_shop"] = implode( ",", $equipment_shop );
		}

		// 更新条件
		$where = $this->_CtrTablePk . " = " . $arrVal["id_schedule"];

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, $arrVal, $arrSql, $where );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：updatelecturer
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ更新（講師）
	//-------------------------------------------------------
	function updatelecturer( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 更新条件
		$where = $this->_CtrTablePk2 . " = " . $arrVal["id_schedule_lecturer"];

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable2, $arrVal, $arrSql, $where );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：updateojt
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：申込みデータ更新（講師）
	//-------------------------------------------------------
	function updateojt( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 更新条件
		$where = $this->_CtrTablePk3 . " = " . $arrVal["id_schedule_ojt"];

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable3, $arrVal, $arrSql, $where );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：delete
	// 引  数：$id - 削除する申込みID
	// 戻り値：true - 正常, false - 異常
	// 内  容：申込みデータ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		// ファイル設定ループ
		if( !empty( $this->_ARR_FILE ) && is_array( $this->_ARR_FILE ) ){

			foreach( $this->_ARR_FILE as $key => $val ) {
				$select[] = $val["name"];
			}

			// SQL配列
			$creation_kit  = array( "select" => implode( ",", $select ),
									"from"   => $this->_CtrTable,
									"where"  => $this->_CtrTablePk . " = " . $id );

			// データ取得
			$tmp = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

			// ファイル削除
			$this->_FN_file->delFile( $this->_ARR_FILE, $tmp );

		}

		// 更新
		$res = $this->_DBconn->delete( $this->_CtrTable, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：changeDisplay
	// 引  数：$id  - ID
	//       ：$flg - フラグ
	// 戻り値：true - 正常, false - 異常
	// 内  容：表示切り替え
	//-------------------------------------------------------
	function changeDisplay( $id, $flg ) {

		// 初期化
		$res = false;

		// 切り替え処理
		$res = $this->_DBconn->update( $this->_CtrTable, array( "display_flg" => $flg ), null, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetSearchList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	//       ：$select - 取得カラム
	//       ：$where  - 取得条件2
	// 戻り値：申込みリスト
	// 内  容：申込み検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null, $where = null, $select = null ) {

		// SQL配列
		$creation_kit = array(  "select" => $this->_CtrTable . ".*,
											GROUP_CONCAT( " . $this->_CtrTable2 . ".id_lecturer SEPARATOR ',' ) as id_lecturer",
								"from"   => $this->_CtrTable,
								"join"   => "left join " . $this->_CtrTable2 . " on " .
											$this->_CtrTable2 . ".id_schedule = " . $this->_CtrTable . ".id_schedule",
								"group"  => $this->_CtrTable . ".id_schedule ", 
								"where"  => $this->_CtrTable . ".class = 1 ",
								"order"  => $this->_CtrTable . ".number DESC"
							);

		// 検索条件
		if( !empty( $search["search_keyword"] ) ) {


			//----------------------------------
			// 講師名も検索に追加
			//----------------------------------
			// データ取得
			$mst_lecturer = $this->_DBconn->selectCtrl( array(  "select" => "id_lecturer", "from" => "mst_lecturer", "where"  => " ( ( name LIKE '%" . $search["search_keyword"] . "%' ) OR ( ruby LIKE '%" . $search["search_keyword"] . "%' ) ) ", "order"  => "number ASC" ), array( "fetch" => _DB_FETCH_ALL ) );

			if( !empty( $mst_lecturer ) && is_array( $mst_lecturer ) ){
				foreach ( $mst_lecturer as $key => $val ) {
					$search_lecturer[] = "( FIND_IN_SET( " . $val["id_lecturer"] . ", id_lecturer ) )";
				}
				$creation_kit["where"] .= "AND ( ( ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], $this->_CtrTable . ".name", "LIKE", "OR", "%string%" ) . " ) OR ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], $this->_CtrTable . ".place", "LIKE", "OR", "%string%" ) . " ) ) ";
				$creation_kit["where"] .= "OR ( " . implode( " OR ", $search_lecturer ) . " ) ) ";
			}else{
				$creation_kit["where"] .= "AND ( ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], $this->_CtrTable . ".name", "LIKE", "OR", "%string%" ) . " ) OR ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], $this->_CtrTable . ".place", "LIKE", "OR", "%string%" ) . " ) ) ";
			}

		}

		if( !empty( $search["search_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", $this->_CtrTable . ".action_date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", $this->_CtrTable . ".action_date", " <= ", null, null ) . " ";
		}

		// 実施日
		if( !empty( $search["search_action_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_start"] . "'", $this->_CtrTable . ".action_date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_action_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_end"] . "'", $this->_CtrTable . ".action_date", " <= ", null, null ) . " ";
		}
		// 年度
		if( !empty( $search["search_schedule_year"] ) ) {
			$creation_kit["where"] .= "AND schedule_year = " . $search["search_schedule_year"] . " ";
		}

		// テーマ
		if( !empty( $search["search_theme"] ) ) {
			$creation_kit["where"] .= "AND theme_program = " . $search["search_theme"] . " ";
		}

		// メニュー
		if( !empty( $search["search_menu"] ) ) {
			$creation_kit["where"] .= "AND menu_program = " . $search["search_menu"] . " ";
		}

		if( !empty( $select ) ){
			$creation_kit["select"] = $select;
			unset( $creation_kit["join"], $creation_kit["group"] );
		}

		if( !empty( $where ) ){
			$creation_kit["where"] = $where;
			unset( $creation_kit["join"], $creation_kit["group"] );
		}

		// 取得条件
		if( empty( $option ) ) {

			// ページ切り替え配列
			$_PAGE_INFO = array( "PageNumber"      => ( !empty( $search["page"] ) ) ? $search["page"] : 1,
								 "PageShowLimit"   => _PAGESHOWLIMIT,
								 "PageNaviLimit"   => _PAGENAVILIMIT,
								 "LinkSeparator"   => " | ",
								 "PageUrlFreeMode" => 1,
								 "PageFileName"    => "javascript:changePage(%d);" );

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL,
							 "page"  => $_PAGE_INFO );

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：GetSearchList2
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	//       ：$select - 取得カラム
	//       ：$where  - 取得条件2
	// 戻り値：申込みリスト
	// 内  容：申込み検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList2( $search, $option = null, $where = null, $select = null ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "class = 2 ",
								"order"  => "number DESC"
							);

		// 検索条件
		if( !empty( $search["search_keyword"] ) ) {
			$creation_kit["where"] .= "AND ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], "name", "LIKE", "OR", "%string%" ) . " ) ";
		}

		if( !empty( $search["search_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", $this->_CtrTable . ".date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", $this->_CtrTable . ".date", " <= ", null, null ) . " ";
		}

		// 実施日
		if( !empty( $search["search_action_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_start"] . "'", $this->_CtrTable . ".action_date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_action_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_end"] . "'", $this->_CtrTable . ".action_date", " <= ", null, null ) . " ";
		}

		// 年度
		if( !empty( $search["search_schedule_year"] ) ) {
			$creation_kit["where"] .= "AND schedule_year = " . $search["search_schedule_year"] . " ";
		}

		if( !empty( $select ) ){
			$creation_kit["select"] = $select;
		}

		if( !empty( $where ) ){
			$creation_kit["where"] = $where;
		}

		// 取得条件
		if( empty( $option ) ) {

			// ページ切り替え配列
			$_PAGE_INFO = array( "PageNumber"      => ( !empty( $search["page"] ) ) ? $search["page"] : 1,
								 "PageShowLimit"   => _PAGESHOWLIMIT,
								 "PageNaviLimit"   => _PAGENAVILIMIT,
								 "LinkSeparator"   => " | ",
								 "PageUrlFreeMode" => 1,
								 "PageFileName"    => "javascript:changePage(%d);" );

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL,
							 "page"  => $_PAGE_INFO );

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：GetSearchSanyouList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：さんよう号貸出リスト
	// 内  容：申込み検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchSanyouList( $search ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "class = 2 AND set_flg != 0 ",
								"order"  => "number DESC"
							);

		// 検索条件
		if( !empty( $search["search_action_date_start"] ) && !empty( $search["search_action_date_end"] ) ) {
			$creation_kit["where"] .= "AND ( ( " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_end"] . "'", $this->_CtrTable . ".hope_start_date", " <= ", null, null ) . " AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_start"] . "'", $this->_CtrTable . ".hope_start_date", " >= ", null, null ) . " ) OR ( " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_end"] . "'", $this->_CtrTable . ".return_hope_date", " <= ", null, null ) . " AND " . $this->_DBconn->createWhereSql( "'" . $search["search_action_date_start"] . "'", $this->_CtrTable . ".return_hope_date", " >= ", null, null ) . " ) ) ";
		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetIdRow
	// 引  数：$id - 申込みID
	// 戻り値：申込み
	// 内  容：申込みを1件取得する
	//-------------------------------------------------------
	function GetIdRow( $id ) {

		// データチェック
		if( !is_numeric( $id ) ) {
			return null;
		}

		// SQL配列
		$creation_kit = array( "select" => "*",
							   "from"   => $this->_CtrTable,
							   "where"  => $this->_CtrTablePk . " = " . $id );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：GetSearchLecturerList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：申込みリスト
	// 内  容：申込み検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchLecturerList( $search ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable2,
								"where"  => "id_schedule = " . $search["id_schedule"],
								"order"  => "id_schedule_lecturer ASC"
							);


		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetSearchOjtList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：申込みリスト
	// 内  容：申込み検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchOjtList( $search ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable3,
								"where"  => "id_schedule = " . $search["id_schedule"],
								"order"  => "id_schedule_ojt ASC"
							);

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;

	}

}

?>
