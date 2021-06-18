<?php

namespace App\Controllers;

use App\Models\PostsModel;
use App\Models\CommentsModel;

class Main extends BaseController
{
    public function __construct()
    {
        $this->postsModel = new PostsModel();
        $this->commentModel = new CommentsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'InstaApp',
            'validation' => \config\services::validation(),
            'posts' => $this->postsModel->orderBy('created_at', 'DESC')->findAll()
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
            return redirect()->to('/')->withInput();
        }
    }

    public function comment($username, $id)
    {
        $data = [
            'title' => 'Comments - ' . $username,
            'id' => $id,
            'comments' => $this->commentModel->getComment($username, $id),
            'content' => $this->postsModel->getPostContent($username, $id),
        ];

        return view('comment', $data);
    }

    public function saveComment()
    {
        $request = service('request');
        helper(['form', 'url']);
        $error = 'no';

        $rules = [
            'comment' => [
                'rules' => 'required|max_length[140]',
                'errors' => [
                    'required' => 'Please input your comment',
                    'max_length' => 'Your comment must be less than 140 characters'
                ]
            ],
        ];

        $error = $this->validate($rules);

        if (!$error) {
            $error = 'yes';
        } else {
            $this->commentModel->save([
                'post_id' => intval($request->getVar('post_id')),
                'user_cmt' => $request->getVar('username'),
                'comment' => $request->getVar('comment'),
            ]);
        }

        $output = [
            'error' => $error
        ];

        echo json_encode($output);
    }

    public function deleteComment($id)
    {
        $this->commentModel->where('id', $id)->delete();
    }
}
