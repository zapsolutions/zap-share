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
			$this->Crud->on('beforeRedirect', function ($e) {
				if ($e->subject->success) {
					$e->subject->url = $this->referer();
				}
			});
		} else {
			$this->Crud->on('beforeRedirect', function ($e) {
				if ($e->subject->success) {
					$e->subject->url = ['controller' => 'pages', 'action' => 'display', 'home'];
				}
			});
		}
	}
}
