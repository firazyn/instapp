<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['post_id', 'user_cmt', 'comment'];

    public function getComment($username, $id)
    {
        return $this->select('comments.id, user_cmt, comment, comments.created_at')
            ->join('users', 'comments.user_cmt = users.username')->join('posts', 'comments.post_id = posts.id')
            ->where('post_id', $id)->where('posts.username', $username)->where('comments.deleted_at', NULL)->where('posts.deleted_at', NULL)
            ->where('users.deleted_at', NULL)
            ->orderBy('comments.id', 'ASC')->get()->getResultArray();
    }
}
