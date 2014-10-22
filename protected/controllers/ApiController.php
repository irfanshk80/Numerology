<?php
class ApiController extends Controller
{
	public function actionGetRegister() {
		echo 'error';
	}
	public function actionAppOpen() {
		$res = array();
		echo 'here';exit;
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
		$AppVersion = isset($_REQUEST['AppVersion']) ? $_REQUEST['AppVersion'] : '';
		$ScreenWidth = isset($_REQUEST['ScreenWidth']) ? $_REQUEST['ScreenWidth'] : '';
		$ScreenHeight = isset($_REQUEST['ScreenHeight']) ? $_REQUEST['ScreenHeight'] : '';
		$AppOS = isset($_REQUEST['AppOS']) ? $_REQUEST['AppOS'] : '';
		
		if(isset($AppID)) {
			echo 'set';
		}
	}
}

?>