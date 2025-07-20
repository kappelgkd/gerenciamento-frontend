<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class DashBoardController extends Action {

	public function blog() {

		$this->render('blog');

	}

	public function organizacao() {

		$this->render('organizacao');
	}

	

	

}


?>