<?php
App::uses('AppController', 'Controller');
/**
 * Data Controller
 *
 * @property Datum $Datum
 */
class DataController extends AppController {

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
