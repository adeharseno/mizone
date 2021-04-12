<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class Forms extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\Forms';
    public function submit()
    {
        $validation =  \Config\Services::validation();
 
        $name   = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $address = $this->request->getPost('address');
        $category = $this->request->getPost('category');
        $message = $this->request->getPost('message');
        $attachment = $this->request->getPost('attachment');
        
        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'category' => $category,
            'message' => $message,
            'attachment' => $attachment
        ];

        if ($validation->run($data, 'form') == FALSE) {
            $response = [
                'status' => 422,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 422);
        } else {
            $email = \Config\Services::email();

            $dataFile = $this->request->getFile('file');
            $fileName = null;

            if (isset($dataFile) && !empty($dataFile)) {
                $fileName = $dataFile->getRandomName();
                $dataFile->move('uploads/file/', $fileName);
                $data['attachment'] = $fileName;
            }

            $email->setTo('alfinsocial@gmail.com');
            $email->setFrom('info@mizone.co.id', 'Admin Mizone');
            $email->setSubject('Pertanyaan baru');
            $email->setMessage('Halo Admin,<br>Berikut terdapat data user baru yang mempunyai pertanyaan terkait Mizone: <br>Nama: '.$data['name'].'<br>Email: '.$data['email'].'<br>Pesan: '.$data['message']);
            
            if (!$email->send()) {
                $msg = ['message' => $email->printDebugger(['headers'])];
                $response = [
                    'status' => 422,
                    'error' => true,
                    'data' => $msg,
                ];
                return $this->respond($response, 422);
            }

            $save = $this->model->insertForms($data);
            if ($save) {
                $msg = ['message' => 'Created form successfully'];
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