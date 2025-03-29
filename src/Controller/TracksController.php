<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tracks Controller
 *
 * @property \App\Model\Table\TracksTable $Tracks
 */
class TracksController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        $this->Authorization->skipAuthorization();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->Tracks->find()
            ->contain(['Albums']);
        $tracks = $this->paginate($query);

        $this->set(compact('tracks'));
    }

    /**
     * View method
     *
     * @param string|null $id Track id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $track = $this->Tracks->get($id, contain: ['Albums']);
        $this->Authorization->skipAuthorization();
        $this->set(compact('track'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $track = $this->Tracks->newEmptyEntity();
        if ($this->request->is('post')) {
            $track = $this->Tracks->patchEntity($track, $this->request->getData());
            if ($this->Tracks->save($track)) {
                $this->Flash->success(__('The track has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The track could not be saved. Please, try again.'));
        }
        $albums = $this->Tracks->Albums->find('list', limit: 200)->all();
        $this->set(compact('track', 'albums'));

        $this->Authorization->authorize($track);
    }


    /**
     * Edit method
     *
     * @param string|null $id Track id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $track = $this->Tracks->get($id, contain: []);
        $this->Authorization->authorize($track);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $track = $this->Tracks->patchEntity($track, $this->request->getData());
            if ($this->Tracks->save($track)) {
                $this->Flash->success(__('The track has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The track could not be saved. Please, try again.'));
        }
        $albums = $this->Tracks->Albums->find('list', limit: 200)->all();
        $this->set(compact('track', 'albums'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Track id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $track = $this->Tracks->get($id);
        $this->Authorization->authorize($track);
        $this->request->allowMethod(['post', 'delete']);
        if ($this->Tracks->delete($track)) {
            $this->Flash->success(__('The track has been deleted.'));
        } else {
            $this->Flash->error(__('The track could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
