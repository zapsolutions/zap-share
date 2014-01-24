<?php
App::uses('AppController', 'Controller');
/**
 * Data Controller
 *
 * @property Datum $Datum
 * @property PaginatorComponent $Paginator
 */
class DataController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Datum->recursive = 0;
		$this->set('data', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Datum->exists($id)) {
			throw new NotFoundException(__('Invalid datum'));
		}
		$options = array('conditions' => array('Datum.' . $this->Datum->primaryKey => $id));
		$this->set('datum', $this->Datum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Datum->create();
			if ($this->Datum->save($this->request->data)) {
				$this->Session->setFlash(__('The datum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datum could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Datum->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Datum->exists($id)) {
			throw new NotFoundException(__('Invalid datum'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Datum->save($this->request->data)) {
				$this->Session->setFlash(__('The datum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Datum.' . $this->Datum->primaryKey => $id));
			$this->request->data = $this->Datum->find('first', $options);
		}
		$projects = $this->Datum->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Datum->id = $id;
		if (!$this->Datum->exists()) {
			throw new NotFoundException(__('Invalid datum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Datum->delete()) {
			$this->Session->setFlash(__('The datum has been deleted.'));
		} else {
			$this->Session->setFlash(__('The datum could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
