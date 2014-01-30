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
