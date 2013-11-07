
<?php 

/**
 * 
 */
class User extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->view->render('views/user/user');
	}
}
