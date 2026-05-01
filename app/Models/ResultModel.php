<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table      = 'result';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'AdmissionID',
        'Sem',
        'CreatedDate'
    ];
}