<?php
//date_default_timezone_set('Asia/Kolkata');
class CommsController extends Controller
{
	public function actionIndex() {
		$this->render('index');
	}
	
	public function actionAppOpen() {
		$res = array();
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
		$AppVersion = isset($_REQUEST['AppVersion']) ? $_REQUEST['AppVersion'] : '';
		$ScreenWidth = isset($_REQUEST['ScreenWidth']) ? $_REQUEST['ScreenWidth'] : '';
		$ScreenHeight = isset($_REQUEST['ScreenHeight']) ? $_REQUEST['ScreenHeight'] : '';
		$AppOS = isset($_REQUEST['AppOS']) ? $_REQUEST['AppOS'] : '';
		
		//Adding up new AppID if AppID is empty or 0
		if($AppID == 0 || empty($AppID)) {
			$modelApp = new Appinfo();
			$modelApp->AppStatus = 1;
			$modelApp->attributes = $_REQUEST;
			$modelApp->unsetAttributes(array('AppID'));
			
			if($modelApp->save()) {
				$res['status'] = "OK";
				$res['AppID'] = $modelApp->AppID;
				$res['AppVer'] = $modelApp->AppVersion;
				$res['Width'] = $modelApp->ScreenWidth;
				$res['Height'] = $modelApp->ScreenHeight;
			} else {
				$res['status'] = "FAIL";
				$res['retID'] = "431";
			}
		} else {
			//Fetch the info using AppID from the model
			$modelApp = Appinfo::model()->findByAttributes(array("AppID" => $AppID));

			if(isset($modelApp)) {
				$res['status'] = "OK";
				$res['feedback'] = "Existing Account Found";
				$res['AppID'] = $modelApp->AppID;
			} else {
				$res['status'] = "FAIL";
				$res['feedback'] = "Account Not Found";
			}
		}
		header("Content-type: application/json");
		echo json_encode($res);
	}

	public function actionNumerologyCalculate() {
		$res = array();
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
		$personName = isset($_REQUEST['personName']) ? $_REQUEST['personName'] : '';
		$personDay = isset($_REQUEST['personDay']) ? $_REQUEST['personDay'] : '';
		$personMonth = isset($_REQUEST['personMonth']) ? $_REQUEST['personMonth'] : '';
		$personYear = isset($_REQUEST['personYear']) ? $_REQUEST['personYear'] : '';

		$feedbackText = array("SectionTitle" => "", "SectionText" => "");
		
		//Checking All the parameters
		if(!empty($personDay) && !empty($personMonth) && !empty($personYear)) {
			
			//Adding all day digits
			$arr_day = str_split($personDay);
			$day = 0; $month = 0; $year = 0; $numCal = 11;
			foreach ($arr_day as $value) {
				$day += $value;
			}
			//Adding Month digits
			$arr_month = str_split($personMonth);
			foreach ($arr_month as $value) {
				$month += $value;
			}
			//Adding Year digits
			$arr_year = str_split($personYear);
			foreach ($arr_year as $value) {
				$year += $value;
			}

			//Taking total of all day month and year
			$total = $day + $month + $year;
			$arr_total = str_split($total);
			//print_r($arr_total);

			//Adding digits until string remains 2 digit number.
			while (strlen($numCal) == 2) {
				$numCal = 0;
				foreach ($arr_total as $value) {
					$numCal += $value;
				}
				$arr_total = str_split($numCal);
			}
			$res['status'] = "OK";
			$res['lifeNumber'] = $numCal;
			$res['dayNumber'] = $day;
			$res['nameSuitable'] = false;
			$res['feedbackText'][] = $feedbackText;
				
		} else {
			$res['status'] = "FAIL";
			$res['feedbackText'] = "Invalid Numbers";
		}
		header("Content-type: application/json");
		echo json_encode($res);
	}

	public function actionGetGurus() {
		$res = array();
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
				
		//Fetching All Gurus
		if(!empty($AppID)) {
			$modelGuru = Guru::model()->findAll();
			$arr_guru = array();

			if(isset($modelGuru)) {
				$res['status'] = "OK";
				for($i=0;$i<count($modelGuru);$i++) {
					foreach ($modelGuru[$i] as $key => $value) {
						$arr_guru[$key] = $value;
					}
				$res["guruList"][] = $arr_guru;
				}
			}
			else {
				//Display not found Fail status
				$res['status'] = "FAIL";
				$res['feedback'] = "No Gurus Found";
			}
		} else {
			//AppID not Found
			$res['status'] = "FAIL";
			$res['feedback'] = "AppID Not Found";
		}
		header("Content-type: application/json");
		echo json_encode($res);
	}

	public function actionPurchaseCompleted() {
		$res = array();
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
		$personName = isset($_REQUEST['personName']) ? $_REQUEST['personName'] : '';
		$personDay = isset($_REQUEST['personDay']) ? $_REQUEST['personDay'] : '';
		$personMonth = isset($_REQUEST['personMonth']) ? $_REQUEST['personMonth'] : '';
		$personYear = isset($_REQUEST['personYear']) ? $_REQUEST['personYear'] : '';

		$purchaseRef = isset($_REQUEST['purchaseRef']) ? $_REQUEST['purchaseRef'] : '';
		$emailAdd = isset($_REQUEST['emailAdd']) ? $_REQUEST['emailAdd'] : '';
		$guruID = isset($_REQUEST['guruID']) ? $_REQUEST['guruID'] : '';
		$osPurchase = isset($_REQUEST['osPurchase']) ? $_REQUEST['osPurchase'] : '';
		
		//Fetching purchaseinfo records with these parameters
		if(!empty($AppID) && !empty($personName) && !empty($personDay) && !empty($personMonth) && !empty($personYear) && !empty($purchaseRef) && !empty($emailAdd) && !empty($guruID) && !empty($osPurchase)) {
			//Checking if AppID is correct
			$modelApp = Appinfo::model()->findByAttributes(array("AppID" => $AppID));
			if(isset($modelApp)) {
				//Fetching User record
				$modelUser = User::model()->findByAttributes(array("personName"=>$personName, "personDay" => $personDay, "personMonth" => $personMonth, "personYear" => $personYear, "emailAdd" => $emailAdd));
				if(isset($modelUser)) {
					$modelPurchase = purchaseinfo::model()->findByAttributes(array("purchaseRef" => $purchaseRef, "osPurchase" => $osPurchase));
					if(isset($modelPurchase)) {
						$res['status'] = "OK";
					} else { $res['status'] = "FAIL"; $res['debug'] = 'Purchase Ref not found'; }
				} else { $res['status'] = "FAIL"; $res['debug'] = 'User Record not found'; }
			} else { $res['status'] = "FAIL"; $res['debug'] = 'AppID not found'; }

		} else {
			//Fetch the info using AppID from the model
			$res['status'] = "FAIL";
		}
		header("Content-type: application/json");
		echo json_encode($res);
	}

	public function actionEmailReport() {
		$res = array();
		
		$AppID = isset($_REQUEST['AppID']) ? $_REQUEST['AppID'] : '';
		$personName = isset($_REQUEST['personName']) ? $_REQUEST['personName'] : '';
		$personDay = isset($_REQUEST['personDay']) ? $_REQUEST['personDay'] : '';
		$personMonth = isset($_REQUEST['personMonth']) ? $_REQUEST['personMonth'] : '';
		$personYear = isset($_REQUEST['personYear']) ? $_REQUEST['personYear'] : '';

		$emailAdd = isset($_REQUEST['emailAdd']) ? $_REQUEST['emailAdd'] : '';
				
		//Fetching purchaseinfo records with these parameters
		if(!empty($AppID) && !empty($personName) && !empty($personDay) && !empty($personMonth) && !empty($personYear) && !empty($emailAdd)) {
			//Checking if AppID is correct
			$modelApp = Appinfo::model()->findByAttributes(array("AppID" => $AppID));
			if(isset($modelApp)) {
				//Fetching User record
				$modelUser = User::model()->findByAttributes(array("personName"=>$personName, "personDay" => $personDay, "personMonth" => $personMonth, "personYear" => $personYear));
				if(isset($modelUser)) {
					if($this->sendMail($modelUser)) {
						$res['status'] = "OK";
						$res['Email'] = "Sent";
					}
				} else { $res['status'] = "FAIL"; $res['debug'] = 'User Record not found'; }
			} else { $res['status'] = "FAIL"; $res['debug'] = 'AppID not found'; }

		} else {
			//Fetch the info using AppID from the model
			$res['status'] = "FAIL";
			$res['feedbackText'] = 'Invalid Text';
		}
		header("Content-type: application/json");
		echo json_encode($res);
	}

	public function sendMail($modelUser) {
		$to = $modelUser->emailAdd;
   		$subject = "Report";
   		$message = $modelUser['personName'];
   		$header = "From:num@numerology.com \r\n";
		//$retval = mail ($to,$subject,$message,$header);
		$retval = true;

   		if( $retval == true ) {
      		return 1;
   		} else {
      		return 0;
   		}
	}
}

?>