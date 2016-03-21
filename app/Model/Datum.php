<?php
App::uses('AppModel', 'Model');
/**
 * Datum Model
 *
 * @property Project $Project
 */
class Datum extends AppModel {

	public $useTable = 'data';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = [
		'Project' => [
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];
}
