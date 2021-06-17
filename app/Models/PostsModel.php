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
}
