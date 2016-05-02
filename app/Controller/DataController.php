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

	public function add() {
		if($this->request->is('POST')) {
			if($this->Data->save($this->request->data)) {
				$this->redirect(['action' => 'project', $this->request->data['Data']['project_id']]);
			}
		}
	}

	public function edit($dataId) {
		if($this->request->is('POST') || $this->request->is('PUT')) {
			if($this->Data->save($this->request->data)) {
				$this->redirect(['action' => 'project', $this->request->data['Data']['project_id']]);
			}
		} else {
			$this->request->data = $this->Data->read(null, $dataId);
		}
	}

/**
  * Grab all data for a project
  */
	public function project($projectID = null) {
		if(!$this->Datum) $this->loadModel('Datum');

		$data = $this->Data->find('all', [
			'conditions' => [
				'project_id' => $projectID
			]
		]);
		$project = $this->Data->Project->find('first', [
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

		$data = $this->Data->find('all', [
			'conditions' => [
				'project_id' => $projectId
			]
		]);

		$this->set(compact('data'));
		$this->set('_serialize', ['data']);
	}
}
