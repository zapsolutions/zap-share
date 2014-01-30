<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {

	public function add() {
		$this->Crud->on('beforeRedirect', function ($e) {
			if ($e->subject->success) {
				$e->subject->url = $this->referer();
			}
		});

		return $this->Crud->execute();
	}

	public function edit() {
		$this->Crud->on('beforeRedirect', function ($e) {
			if ($e->subject->success) {
				$e->subject->url = $this->referer();
			}
		});

		return $this->Crud->execute();
	}

	public function delete() {
		$this->Crud->on('beforeRedirect', function ($e) {
			if ($e->subject->success) {
				$e->subject->url = ['controller' => 'pages', 'action' => 'display', 'home'];
			}
		});

		return $this->Crud->execute();
	}

}
