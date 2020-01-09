<?php
//----------------------------------------------------------------------------
// 作成日: 2016/11/01
// 作成者: 鈴木
// 内  容: お知らせクラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class FT_rental {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "mst_rental";
	var $_CtrTablePk = "id_rental";

	// コントロール機能（ログ用）
	var $_CtrLogName = "お知らせ";


	//-------------------------------------------------------
	// 関数名: __construct
	// 引  数: $dbconn  :  DB接続オブジェクト
	// 戻り値: なし
	// 内  容: コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}

	}


	//-------------------------------------------------------
	// 関数名: __destruct
	// 引  数: なし
	// 戻り値: なし
	// 内  容: デストラクタ
	//-------------------------------------------------------
	function __destruct() {

	}


	//-------------------------------------------------------
	// 関数名: GetSearchList
	// 引  数: $search - 検索条件
	//       : $option - 取得条件
	// 戻り値: リスト
	// 内  容: 検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null, $limit = null ) {

		// SQL配列
		$creation_kit = array(  "select" => $this->_CtrTable . ".id_rental, "
											. $this->_CtrTable . ".id_rental_category, "
											. $this->_CtrTable . ".name, "
											. $this->_CtrTable . ".unit, "
											. $this->_CtrTable . ".comment ",
								"from"   => $this->_CtrTable,
								"where"  => $this->_CtrTable . ".display_flg = 1 ",
								"order"  => $this->_CtrTable . ".display_num asc"
							);

		if( !empty( $search["search_category"] ) ) {
			$creation_kit["where"] .= " AND " . $this->_CtrTable . ".id_rental_category = " . $search["search_category"] . " ";
		}

		// 取得条件
		if( empty( $option ) ) {

			// ページ切り替え配列
			$_PAGE_INFO = array( "PageNumber"      => $search["page"],
								 "PageShowLimit"   => _PAGESHOWLIMIT,
								 "PageNaviLimit"   => _PAGENAVILIMIT,
								 "LinkSeparator"   => " ",
								 "LinkBackText"    => "&lt; 前へ",
								 "LinkNextText"    => "次へ &gt;",
								 "LinkBackClass"   => "next",
								 "LinkNextClass"   => "back",
								 "LinkSpanPref"    => "<li>",
								 "LinkSpanPost"    => "</li>",
								 "LinkSpanNowPref" => "<strong>",
								 "LinkSpanNowPost" => "</strong>" );

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL,
							 "page"  => $_PAGE_INFO );

		} else {
		
			// 取得件数制限
			if( !empty( $limit ) ) {
				$creation_kit["limit"] = $limit;
			}

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );
		
		$mst_res = array();
		if( !empty( $res["data"] ) ){
			$mst_res = $res["data"];
			
		} elseif( !empty( $res[0] ) ){
			$mst_res = $res;
		}
		
		// パーツを取得
		if( !empty( $mst_res[0] ) ){
			$creation_kit = array(  "select" => "t_rental_parts.id_rental_parts, 
																t_rental_parts.id_rental, 
																t_rental_parts.comment, 
																t_rental_parts.price, 
																t_rental_parts.image1, 
																t_rental_parts.image2, 
																t_rental_parts.image3, 
																t_rental_parts.image4, 
																t_rental_parts.image5",
									"from"   => "t_rental_parts",
									"order"  => "t_rental_parts.id_rental_parts ASC"
								);
			
			foreach( $mst_res as $key => $val ){
				$creation_kit["where"] = "t_rental_parts.id_rental = " . $val["id_rental"];
				
				// データ取得
				$mst_res[$key]["parts"] = $this->_DBconn->selectCtrl( $creation_kit, array("fetch" => _DB_FETCH_ALL) );
			}
			
			if( !empty( $res["data"] ) ){
				$res["data"] = $mst_res;
				
			} elseif( !empty( $res[0] ) ){
				$res = $mst_res;
			}
			
		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetIdRow
	// 引  数: $id   - ID
	// 戻り値: 1件分
	// 内  容: 1件取得する
	//-------------------------------------------------------
	function GetIdRow( $id ) {

		// データチェック
		if( !is_numeric( $id ) ) {
			return null;
		}

		// SQL配列
		$creation_kit = array( "select" => "*",
							   "from"   => $this->_CtrTable,
							   "where"  => "display_flg = 1 AND " .
											$this->_CtrTablePk . " = " . $id );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );
		
		if( !empty( $res["id_rental"] ) ){
			$creation_kit = array(  "select" => "t_rental_parts.*",
									"from"   => "t_rental_parts",
									"where" => "t_rental_parts.id_rental = " . $res["id_rental"],
									"order"  => "t_rental_parts.id_rental_parts ASC"
								);
			
			// データ取得
			$res["parts"] = $this->_DBconn->selectCtrl( $creation_kit, array("fetch" => _DB_FETCH_ALL) );
			
		}

		// タグ許可
		if( !empty($res["comment"]) ){
			$res["comment"] = html_entity_decode( $res["comment"] );
		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetDetailPageNavi
	// 引  数: $id   - お知らせID
	// 戻り値: ページナビ
	// 内  容: 詳細ページ用のページナビを作成する
	//-------------------------------------------------------
	function GetDetailPageNavi( $id ) {

		// データチェック
		if( !is_numeric( $id ) ) {
			return null;
		}

		// SQL配列
		$creation_kit = array(  "select" => $this->_CtrTablePk,
								"from"   => $this->_CtrTable,
								"where"  => "display_flg = 1 AND
											 date <= NOW() AND
										   ( display_indefinite = 1 OR
										   ( NOW() BETWEEN display_start AND display_end ) ) ",
								"order"  => "date DESC"
							);

		// データ取得
		$aryId = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_COL ) );

		// データチェック
		if( is_array( $aryId ) ) {

			// 現在のKey
			$pageKey = array_search( $id, $aryId );

			// ページング
			$res["back"] = $aryId[$pageKey+1];
			$res["now"]  = $aryId[$pageKey];
			$res["next"] = $aryId[$pageKey-1];

		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetOption
	// 引  数: なし
	// 戻り値: お知らせカテゴリーオプション
	// 内  容: お知らせカテゴリーをオプション化して取得
	//-------------------------------------------------------
	function GetOption() {

		// SQL配列
		$creation_kit = array(  "select" => "id_category, title",
								"from"   => "mst_info_category",
								"where"  => "delete_flg = 0 ",
								"order"  => "display_num ASC"
							);
		// データ取得
		$arr_option = $this->_DBconn->selectCtrl( $creation_kit, array("fetch" => _DB_FETCH_ALL) );

		// オプション用に成形
		if( !empty($arr_option) ){
			foreach( $arr_option as $val ){
				$res[$val["id_category"]] = $val["title"];
			}
		}

		// 戻り値
		return $res;

	}

}
?>
