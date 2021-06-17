<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Main extends BaseController
{
    public function __construct()
    {
        $this->postsModel = new PostsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'InstaApp',
            'validation' => \config\services::validation(),
            'pics' => $this->postsModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('home', $data);
    }

    public function uploadPost()
    {
        $request = service('request');

        $rules = [
            'picture' => [
                'rules' => 'uploaded[picture]|max_size[picture,40000]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please select a picture',
                    'max_size' => 'The picture size is too large (max: 40MB)',
                    'is_image' => 'The uploaded file is not an image',
                    'mime_in' => 'The uploaded file format is not supported',
                ]
            ],
            'caption' => [
                'rules' => 'max_length[140]',
                'errors' => [
                    'max_length' => 'Caption should be less than 140 characters',
                ]
            ],
        ];

        $savePicture = $request->getFile('picture');

        if ($this->validate($rules)) {
            $picName = $savePicture->getRandomName();
            $savePicture->move('img/pics', $picName);
            $this->postsModel->insert([
                'picture' => $picName,
                'username' => session()->get('username'),
                'caption' => $request->getVar('caption'),
            ]);

            session()->setFlashdata('msg', 'Picture posted!');

            return redirect()->to('/');
        } else {
            // $validator = \Config\Services::validation();
            return redirect()->to('/')->withInput();
        }
    }
}
