<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'coursemaster';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'ID',
        'CCode',
        'CName',
        'Duration',
        'IsFixSub',
        'RStatus',
        'CreatedDate'
    ];

    protected $useTimestamps = false; 
}
