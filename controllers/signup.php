
<?php 

/**
 * 
 */
class Signup extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->view->render('views/signup/signup');
	}
}
