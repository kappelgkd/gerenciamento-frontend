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

		$routes['blog'] = array(
			'route' => '/blog',
			'controller' => 'DashBoardController',
			'action' => 'blog'
		);


		$routes['organizacao'] = array(
			'route' => '/organizacao',
			'controller' => 'DashBoardController',
			'action' => 'organizacao'
		);

		$this->setRoutes($routes);
	}

}

?>