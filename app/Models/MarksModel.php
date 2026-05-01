<?php

namespace App\Models;

use CodeIgniter\Model;
class MarksModel extends \CodeIgniter\Model
{
    protected $table = ' markentry';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'ResultID',
        'SubjectName',
        'MaxMark',
        'ObtainMark',
        'MaxPracMark',
        'MaxObtainMark',
        'Sequence'
    ];
}