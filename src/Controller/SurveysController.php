<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Surveys Controller
 *
 * @property \App\Model\Table\SurveysTable $Surveys
 *
 * @method \App\Model\Entity\Survey[] paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $surveys = $this->paginate($this->Surveys);

        $this->set(compact('surveys'));
        $this->set('_serialize', ['surveys']);
    }

    /**
     * View method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => []
        ]);

        $this->set('survey', $survey);
        $this->set('_serialize', ['survey']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $survey = $this->Surveys->newEntity();
        if ($this->request->is('post')) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $this->set(compact('survey'));
        $this->set('_serialize', ['survey']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $this->set(compact('survey'));
        $this->set('_serialize', ['survey']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $survey = $this->Surveys->get($id);
        if ($this->Surveys->delete($survey)) {
            $this->Flash->success(__('The survey has been deleted.'));
        } else {
            $this->Flash->error(__('The survey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
