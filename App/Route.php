<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		// ROTAS PUBLICAS. PODEM SER ACESSADAS PELO USUARIO ANTES DE REALIZAR O LOGIN.
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$this->setRoutes($routes);
	}

}

?>