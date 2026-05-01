<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionModel extends Model
{
    protected $table = 'admission';

    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'StuID',
        'CourseID',
        'CreatedDate'
    ];

    protected $useTimestamps = false; // true only if using created_at, updated_at
}