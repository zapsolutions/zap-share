<?php
App::uses('AppController', 'Controller');
/**
 * Data Controller
 *
 * @property Datum $Datum
 */
class DataController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();

		if (in_array($this->action, ['add', 'edit', 'delete'])) {
			$redirectUrl = $this->referer();
		} else {
			$redirectUrl = ['controller' => 'pages', 'action' => 'display', 'home'];
		}

		$this->Crud->on('beforeRedirect', function ($e) {
			if ($e->subject->success) {
				$e->subject->url = $redirectUrl;
			}
		});
	}

	public function project($projectID = null) {
		$data = $this->Datum->find('all', [
			'conditions' => [
				'project_id' => $projectID
			]
		]);
		$project = $this->Datum->Project->find('first', [
			'conditions' => [
				'Project.id' => $projectID
			]
		]);
		$this->set(compact('data', 'project'));
	}
}
