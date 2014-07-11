<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

		if (in_array($this->action, ['add', 'edit'])) {
			$redirectUrl = ['controller' => 'data', 'action' => 'project', $this->Project->getLastInsertID()];
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
