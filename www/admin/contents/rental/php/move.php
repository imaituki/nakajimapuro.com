<?php
//-------------------------------------------------------------------
// 作成日: 2019/06/20
// 作成者: yamakawa
// 内  容: rental 一覧表示
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


//----------------------------------------
//  データ一覧取得
//----------------------------------------
// 操作クラス
$objManage  = new DB_manage( _DNS );

// SQL配列
$creation_kit = array(  "select" => "id_rental_parts, image1, image2, image3, image4, image5",
						"from"   => "t_rental_parts",
						"where"  => "1 ",
						"order"  => "id_rental_parts ASC"
					);

// データ取得
$t_rental = $objManage->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

if( is_array( $t_rental ) ){
	foreach ( $t_rental as $key => $val ) {
		$i = 1;
		for ($i=1; $i <= 5 ; $i++) {
			unset( $file_name_s, $file_name_m, $file_name_l );
			$file_name_s = _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/allimage/" . "s_" . $val["image".$i];
			$file_name_m = _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/allimage/" . "m_" . $val["image".$i];
			$file_name_l = _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/allimage/" . "l_" . $val["image".$i];
			if (file_exists($file_name_s)) {
				@rename($file_name_s, _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/image{$i}/" . "s_" . $val["image".$i]);
			}
			if (file_exists($file_name_m)) {
				@rename($file_name_m, _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/image{$i}/" . "m_" . $val["image".$i]);
			}
			if (file_exists($file_name_l)) {
				@rename($file_name_l, _IMAGEROOTPATH . "/". _CONTENTS_DIR. "/image{$i}/" . "l_" . $val["image".$i]);
			}
		}
	}
}
// クラス削除
unset( $objManage  );
echo "移行完了";
exit;
?>
