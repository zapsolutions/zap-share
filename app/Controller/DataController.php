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

		$this->Crud->on('beforeRedirect', function ($e) use ($redirectUrl) {
			if ($e->subject->success) {
				$e->subject->url = $redirectUrl;
			}
		});
	}

/**
  * Grab all data for a project
  */
	public function project($projectID = null) {
		if(!$this->Datum) $this->loadModel('Datum');

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

	/***
	 * AJAX CALLS
	 **/

	public function get($projectId = null) {
		if(!$this->Datum) $this->loadModel('Datum');

		$data = $this->Datum->find('all', [
			'conditions' => [
				'project_id' => $projectId
			]
		]);

		$this->set(compact('data'));
		$this->set('_serialize', ['data']);
	}
}
