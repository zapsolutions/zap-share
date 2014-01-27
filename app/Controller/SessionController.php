<?php
App::uses('AppController', 'Controller');
/**
 * Session Controller
 */
class SessionController extends AppController {

	public function set_active_menu($clientID = null) {
		if ($this->request->is('post')) {
			$this->Session->write('Sidebar.active', $clientID);
		}
		$this->autoRender = false;
	}

}
