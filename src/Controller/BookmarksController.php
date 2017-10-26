<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Bookmark[] paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function isAuthorized($user){
        if (isset($user['role']) and $user['role'] === 'user') {

            if (in_array($this->request->action, ['add','index'])) {
                
                return true;
            }

            if (in_array($this->request->action, ['edit', 'delete'] )) {
                 
                 $id = $this->request->params['pass'][0];
                 $bookmark = $this->Bookmarks->get($id);
                 if ($bookmark->user_id == $user['id']) {

                    return true;
                     # code...
                 }
            }
        }
        return parent::isAuthorized($user);
    }



    public function index()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'order' => ['id' => 'desc']
        ];
      $this->set('bookmarks', $this->paginate($this->Bookmarks));
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('El enlace  ha sido creado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El enlace no pudo ser creado . intente nuevamente '));
        }
         $this->set(compact('bookmark'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id); 
           
        if ($this->request->is(['patch', 'post', 'put'])) {

            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            $bookmark->user_id = $this->Auth->user('id');
           
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('El bookmark  a sido modificado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El bookmark no a sido modificado intente nuevamente '));
        }
        
        $this->set(compact('bookmark'));
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('El bookmark a sido eliminado'));
        } else {
            $this->Flash->error(__('el bookmark no a sido eliminado. intente nuevamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
