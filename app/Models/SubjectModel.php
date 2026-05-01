<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table            = 'subject';
    protected $primaryKey       = 'ID';

   

    protected $allowedFields = [
        'ID',
        'CID',
        'SCode',
        'SName',
        'Sem',
        'SeqNo',
        'MaxMark',
        'PassMark',
        'MaxPracMark',
        'PassPracMark',
        'RStatus'
    ];

    protected $useTimestamps = false;
}
