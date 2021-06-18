<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['picture', 'username',  'caption'];

    public function getPostContent($username, $id)
    {
        return $this->select('id, picture, caption, username, posts.created_at')
            ->where('id', $id)->where('username', $username)->where('posts.deleted_at', NULL)
            ->first();
    }
}
