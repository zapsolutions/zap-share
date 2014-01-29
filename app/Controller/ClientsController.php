<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

	public function add() {
		$this->Crud->on('beforeRedirect', function ($e) {
			if ($e->subject->success) {
				$e->subject->url = $this->referer();
			}
		});

		return $this->Crud->execute();
	}

}
