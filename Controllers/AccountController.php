<?php

include_once "Controllers/Controller.php";

class AccountController extends Controller {

    
    function route() {
      $action = (isset($_GET['action'])) ? $_GET['action'] : 'accountPersonalInformation';

	  switch($action) {
		case 'accountBookingHistory':
			$this->render("Account", 'accountBookingHistory', array());
			break;
		case 'accountInventory':
			$this->render("Account", 'accountInventory', array());
			break;
		case 'accountBookingList':
			$this->render("Account", 'accountBookingList', array());
			break;
		case 'accountPersonalInformation':
			$this->render("Account", 'accountPersonalInformation', array());
			break;
		case 'accountSchedule':
			$this->render("Account", 'accountSchedule', array());
			break;
		default:
		$this->render("Account", 'accountPersonalInformation', array());
	  }
       
    }

}
?>
