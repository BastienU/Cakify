<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Follows Controller
 *
 * @property \App\Model\Table\FollowsTable $Follows
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class FollowsController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        $this->Authorization->skipAuthorization();
    }
    
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->Follows->find()
            ->contain(['Users', 'Albums', 'Artists']);
        $follows = $this->paginate($query);

        $this->set(compact('follows'));
    }

    /**
     * View method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $follow = $this->Follows->get($id, contain: ['Users', 'Albums', 'Artists']);
        $this->Authorization->authorize($follow);
        $this->set(compact('follow'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $follow = $this->Follows->newEmptyEntity();
        $this->Authorization->authorize($follow);
        if ($this->request->is('post')) {
            $follow = $this->Follows->patchEntity($follow, $this->request->getData());
            if ($this->Follows->save($follow)) {
                $this->Flash->success(__('The follow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The follow could not be saved. Please, try again.'));
        }
        $users = $this->Follows->Users->find('list', limit: 200)->all();
        $albums = $this->Follows->Albums->find('list', limit: 200)->all();
        $artists = $this->Follows->Artists->find('list', limit: 200)->all();
        $this->set(compact('follow', 'users', 'albums', 'artists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $follow = $this->Follows->get($id, contain: []);
        $this->Authorization->authorize($follow);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $follow = $this->Follows->patchEntity($follow, $this->request->getData());
            if ($this->Follows->save($follow)) {
                $this->Flash->success(__('The follow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The follow could not be saved. Please, try again.'));
        }
        $users = $this->Follows->Users->find('list', limit: 200)->all();
        $albums = $this->Follows->Albums->find('list', limit: 200)->all();
        $artists = $this->Follows->Artists->find('list', limit: 200)->all();
        $this->set(compact('follow', 'users', 'albums', 'artists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $follow = $this->Follows->get($id);
        $this->Authorization->authorize($follow);
        if ($this->Follows->delete($follow)) {
            $this->Flash->success(__('The follow has been deleted.'));
        } else {
            $this->Flash->error(__('The follow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
