<?php
//-------------------------------------------------------------------
// 作成日： 2019/01/11
// 作成者： 福嶋
// 内  容： 見積もり 編集
//-------------------------------------------------------------------

//----------------------------------------
//  設定ファイル
//----------------------------------------
require "./config.ini";


// 登録日
$_POST["date"] = date("Y-m-d", strtotime("now"));
$_POST["estimate"] = array( array() );


//----------------------------------------
//  表示
//----------------------------------------
// smarty設定
$smarty = new MySmarty("admin");
$smarty->compile_dir .= "estimate/";
$smarty->assign( "mst_rental", $mst_rental );
// オプション
$smarty->assign( "OptionRental", $OptionRental );
// 表示
$smarty->display( "new.tpl" );

?>
