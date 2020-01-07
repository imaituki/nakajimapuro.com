<?php
//----------------------------------------------------------------------------
// 作成日： 2017/02/07
// 作成者： 鈴木
// 内  容： 器材操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_equipment {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "mst_equipment";
	var $_CtrTablePk = "id_equipment";

	// キャッシュ保存先
	var $_CacheDir = _CACHE_DIR;
	
	// キャッシュ（使用リスト）
	var $_CacheList = null;

	// コントロール機能（ログ用）
	var $_CtrLogName = "器材";

	// ファイル操作クラス
	var $_FN_file = null;

	// 画像設定
	var $_ARR_IMAGE = null;


	//-------------------------------------------------------
	// 関数名：__construct
	// 引  数：$dbconn  ： DB接続オブジェクト
	// 戻り値：なし
	// 内  容：コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn, $arrImg = NULL  ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}
		$this->_FN_file = new FN_file();

		// 設定情報
		$this->_ARR_IMAGE = $arrImg;

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
		$objInputCheck->entryData( "器材名"         ,  "name"   , $arrVal["name"] , array( "CHECK_EMPTY" ), null, null );
		$objInputCheck->entryData( "個数"           ,  "num"    , $arrVal["num"]  , array( "CHECK_EMPTY" ), 0, 255 );
		$objInputCheck->entryData( "所有者"         , "owner"   , $arrVal["owner"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );

		// チェックエントリー（UPDATE時）
		if( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "貸出器材ID", "all", $arrVal["id_equipment"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		}

		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：insert
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：貸出器材データ登録
	//-------------------------------------------------------
	function insert( $arrVal, $arrSql = null ) {

		// アップ処理
		$ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrSql["display_num"] = "( SELECT IFNULL( max_num + 1, 1 ) FROM ( SELECT MAX( display_num ) AS max_num FROM " . $this->_CtrTable . " ) AS maxnm ) ";
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		if( !empty( $arrVal["id_storage"] ) && is_array( $arrVal["id_storage"] ) ){
			$arrVal["id_storage"] = array_filter( $arrVal["id_storage"], "strlen" );
			$arrVal["id_storage"] = implode( ",",  $arrVal["id_storage"]  );
		}
		if( !empty( $arrVal["storage_number"] ) && is_array( $arrVal["storage_number"] ) ){
			$arrVal["storage_number"] = array_filter( $arrVal["storage_number"], "strlen" );
			$arrVal["storage_number"] = implode( ",",  $arrVal["storage_number"]  );
		}
		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable, $arrVal, $arrSql );

		// キャッシュ削除
		$this->_DBconn->freshCacheAll( $this->_CacheDir );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：update
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：貸出器材データ更新
	//-------------------------------------------------------
	function update( $arrVal, $arrSql = null ) {

		// 写真削除
		$this->_FN_file->delImage( $this->_ARR_IMAGE, $arrVal["_delete_image"], $arrVal );
		// アップ処理
		$ImageInfo = $this->_FN_file->copyImage( $_FILES, $this->_ARR_IMAGE, $arrVal );

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 更新条件
		$where = $this->_CtrTablePk . " = " . $arrVal["id_equipment"];
		
		if( !empty( $arrVal["id_storage"] ) && is_array( $arrVal["id_storage"] ) ){
			$arrVal["id_storage"] = array_filter( $arrVal["id_storage"], "strlen" );
			$arrVal["id_storage"] = implode( ",",  $arrVal["id_storage"]  );
		}
		if( !empty( $arrVal["storage_number"] ) && is_array( $arrVal["storage_number"] ) ){
			$arrVal["storage_number"] = array_filter( $arrVal["storage_number"], "strlen" );
			$arrVal["storage_number"] = implode( ",",  $arrVal["storage_number"]  );
		}
		
		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, $arrVal, $arrSql, $where );

		// キャッシュ削除
		$this->_DBconn->freshCacheAll( $this->_CacheDir );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：delete
	// 引  数：$id - 削除する貸出器材ID
	// 戻り値：true - 正常, false - 異常
	// 内  容：貸出器材データ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		// ファイル設定ループ
		if( !empty($this->_ARR_IMAGE) && is_array($this->_ARR_IMAGE) ){
			foreach( $this->_ARR_IMAGE as $key => $val ) {
				$select[] = $val["name"];
			}

			// SQL配列
			$creation_kit  = array( "select" => implode( ",", $select ),
									"from"   => $this->_CtrTable,
									"where"  => $this->_CtrTablePk . " = " . $id );

			// データ取得
			$tmp = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

			// 画像削除
			$this->_FN_file->delImage( $this->_ARR_IMAGE, $tmp );

		}

		// 更新
		$res = $this->_DBconn->delete( $this->_CtrTable, $this->_CtrTablePk . " = " . $id );

		// キャッシュ削除
		$this->_DBconn->freshCacheAll( $this->_CacheDir );

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

		// キャッシュ削除
		$this->_DBconn->freshCacheAll( $this->_CacheDir );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：sort
	// 引  数：$sortIds - ソート順 ID
	//       ：$sortKey - 並び替えのフィールド名
	// 戻り値：true - 正常, false - 異常
	// 内  容：並び替え
	//-------------------------------------------------------
	function sort( $sortIds, $sortKey ) {
		
		// 初期化
		$res = false;

		// データチェック
		if( !empty( $sortIds ) ) {

			// 変数セット
			$this->_DBconn->_ADODB->query("set @a = 0;");

			// ソート
			$res = $this->_DBconn->update( $this->_CtrTable, null, array( "display_num" => "( @a := @a + 1 )" ), $this->_CtrTablePk . " IN( " . $sortIds . " ) ORDER BY FIELD( " . $sortKey . ", " . $sortIds . " ) " );

		}

		// キャッシュ削除
		$this->_DBconn->freshCacheAll( $this->_CacheDir );
		
		// 戻り値
		return $res;

	}
	
	//-------------------------------------------------------
	// 関数名：GetSearchList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：貸出器材リスト
	// 内  容：貸出器材検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "1 ",
								"order"  => "display_num ASC"
							);

		// 検索条件
		if( !empty( $search["search_keyword"] ) ) {
			$creation_kit["where"] .= "AND ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], "name", "LIKE", "OR", "%string%" ) . " ) ";
		}

		// 取得条件
		if( empty( $option ) ) {

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL );

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );

		if( !empty( $res ) && is_array( $res ) ){
			foreach ( $res as $key => $val ) {
				if( !empty( $val["id_storage"] ) ) {
					$res[$key]["id_storage"]     = explode( ",", $val["id_storage"]  );
				}
				if( !empty( $val["storage_number"] ) ) {
					$res[$key]["storage_number"] = explode( ",", $val["storage_number"]  );
				}
			}
		}
		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetIdRow
	// 引  数：$id - 貸出器材ID
	// 戻り値：貸出器材
	// 内  容：貸出器材を1件取得する
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

		if( !empty( $res["id_storage"] ) ){
			$res["id_storage"] = explode( ",",  $res["id_storage"]  );
		}

		if( !empty( $res["storage_number"] ) ){
			$res["storage_number"] = explode( ",",  $res["storage_number"]  );
		}

		// 戻り値
		return $res;

	}

}

?>
