<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController{

public function beforeFilter(\Cake\Event\Event $event){
	parent::beforeFilter($event);
	$this->Auth->allow(['add']);


}

	public function isAuthorized($user){
		if (isset($user['role']) and $user['role'] === 'user') {
			if (in_array($this->request->action, ['home','view','logut'])) {
				return true;
			}
			# code...
		}
		return parent::isAuthorized($user);
	}

	public function login(){

		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				$this->Flash->error('Datos son invalidos, por favor Intente Nuevamente',['key'=>'auth']);
			}
		}
		if ($this->Auth->user()) {
			return $this->redirect(['controller'  => 'Users','action' => 'home']);
		}
	}

	public function logut(){
		return $this->redirect($this->Auth->logout());
	}

	public function home(){
		$this->render();
	}
	
public function index(){
 
	$users =$this->paginate($this->Users);
	$this->set('users',$users);
}

public function view($id){
	$user = $this->Users->get($id);
	$this->set('user', $user);
}

public function add(){

	$user =$this->Users->newEntity();
	if ($this->request->is('post')){
		$user= $this->Users->patchEntity($user,$this->request->data);

		$user->role='admin';
		$user->active=1;

		if($this->Users->save($user)){
			$this->Flash->success('El usuario a Sido Creado Correctamente');
			return $this->redirect(['controller'=>'Users','action'=>'login']);
		}else{
			$this->Flash->error('El Usuario no Pudo Ser Creado. Por favor, Intente Nuevamente');
		}
		# code...
	}
	$this->set(compact('user'));
}

public function edit($id = null){

	$user = $this->Users->get($id);

	if ($this->request->is(['patch', 'post', 'put'])) {

		$user = $this->Users->patchEntity($user, $this->request->data);
		if ($this->Users->save($user)) {

			$this->Flash->success('El Usuario ha sido modificado');
			return $this->redirect(['action' => 'index']);
		}else{
			
			$this->Flash->error('El Usuario no a sido modificado. Intente Nuevamente');

		}
	}
	$this->set(compact('user'));

}

public function borrar($id = null){
	
	$this->request->allowMethod(['post', 'delete']);
	$user = $this->Users->get($id);

	if ($this->Users->delete($user)) {
		$this->Flash->success('El usuario  ha sido eliminado. ');
	}else{
		$this->Flash->error('El usuario no pudo ser eliminado . intente Nuevamente');
	}

	return $this->redirect(['action' => 'index']);

}

}
