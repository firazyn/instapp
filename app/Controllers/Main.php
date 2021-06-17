<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'InstaApp'
        ];
        return view('home', $data);
    }
}
