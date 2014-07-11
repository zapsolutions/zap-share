<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

		if ($this->action === 'add') {
			$redirectUrl = $this->referer();
		} else {
			$redirectUrl = ['controller' => 'pages', 'action' => 'display', 'home'];
		}

		$this->Crud->on('beforeRedirect', function ($e) use ($redirectUrl) {
			if ($e->subject->success) {
				$e->subject->url = $redirectUrl;
			}
		});
	}
}
