<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class Contact extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\Contact';
    public function submit()
    {
        $validation =  \Config\Services::validation();
 
        $name   = $this->request->getPost('name');
        $question = $this->request->getPost('question');
        $email = $this->request->getPost('email');
        
        $data = [
            'name' => $name,
            'question' => $question,
            'email' => $email
        ];

        if ($validation->run($data, 'contact') == FALSE) {
            $response = [
                'status' => 422,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 422);
        } else {
            $email = \Config\Services::email();

            $email->setTo(['alfinsocial@gmail.com', 'warisvito@gmail.com']);
            $email->setFrom('info@mizone.co.id', 'Admin Mizone');
            $email->setSubject('Pertanyaan baru');
            $email->setMessage('Halo Admin,<br>Berikut terdapat data user baru yang mempunyai pertanyaan terkait Mizone: <br>Nama: '.$data['name'].'<br>Email: '.$data['email'].'<br>Pertanyaan: '.$data['question']);
            
            if (!$email->send()) {
                $msg = ['message' => $email->printDebugger(['headers'])];
                $response = [
                    'status' => 422,
                    'error' => true,
                    'data' => $msg,
                ];
                return $this->respond($response, 422);
            }

            $save = $this->model->insertContact($data);
            if ($save) {
                $msg = ['message' => 'Created contact successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
}