<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $files = $this->paginate($this->Files);

        $this->set(compact('files'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $file = $this->Files->newEntity();
        $saveDocs = $this->loadComponent('SaveDocs');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $no_of_docs = count(json_decode(json_encode($data['uploaded_docs']),true));
            $count = 0;
            $docFolder = 'uploadedDocs/';
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                foreach ($data['uploaded_docs'] as $key => $docData) {
                    $fileDtls=$this->Files->FileDtls->newEntity();
                    if (!empty($docData['tmp_name'])) {
                        $rDocs = $this->SaveDocs->saveFiles($docData,$docFolder,$data['file_number'],$count);
                        $fileDtls->file_id = $file->id;
                        $fileDtls->doc_name = $rDocs['doc-name'];
                        $fileDtls->doc_path  = $rDocs['doc-path'];
                        if($this->Files->FileDtls->save($fileDtls)){
                            $count++;
                           
                        }
                    }
                    
                }

                if ($no_of_docs == $count) {
                    $this->Flash->success(__('The file has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }else{
                    if($count!=0){
                        $this->Flash->error(__('Only '.$count.' Docs Saved'));
                    }
                }
            }

            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $this->set(compact('file'));
    }

}
