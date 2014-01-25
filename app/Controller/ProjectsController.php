<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {

	public function view_data($projectID = null) {
		$data = $this->Project->find('all', [
			'conditions' => [
				'Project.id' => $projectID
			],
			'contain' => ['Datum']
		]);
		$this->set(compact('data'));
	}

}
