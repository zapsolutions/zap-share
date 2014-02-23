<?php
App::uses('AppController', 'Controller');
/**
 * Session Controller
 */
class SessionController extends AppController {

/**
  * Sets the client ID for persisting active menu expansion
  *
  * @param null|string $clientID The client UUID or null
  */
	public function set_active_menu($clientID = null) {
		if ($this->request->is('post')) {
			$this->Session->write('Sidebar.active', $clientID);
		}
		$this->autoRender = false;
	}
}
