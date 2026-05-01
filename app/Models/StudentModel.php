<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'student';
    protected $primaryKey       = 'ID';

    // ID is NOT auto increment
    protected $useAutoIncrement = false;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'ID',
        'RegNo',
        'Name',
        'FName',
        'MName',
        'Phone',
        'Whatsapp',
        'Email',
        'DOB',
        'Address',
        'IsResult', // if 1=result will generate,0 no result
        'IsFeePaid', //  if 1=result will generate(Fee paid ),0 no result (Fee Pending)
        'AdmissionDate',
        'CreatedDate'
    ];

    protected $useTimestamps = false;
    public function generateRegNo()
     {
        $prefix = date('ym'); // e.g., "022026"

        // Get only the highest regno for the current month
        $lastReg = $this->db->table($this->table)
                            ->select('regno')
                            ->like('regno', $prefix, 'after')
                            ->orderBy('regno', 'DESC')
                            ->limit(1)
                            ->get()
                            ->getRow();

        if ($lastReg) {
            // Take the last 3 digits and increment
            // e.g., "022026005" -> 5 + 1 = 6
            $lastSequence = (int) substr($lastReg->regno, 6);
            $nextSequence = $lastSequence + 1;
        } else {
            // First student of the month
            $nextSequence = 1;
        }

        // Format: mmyyyy + 3 digits (001 to 999)
        return $prefix . str_pad($nextSequence, 3, '0', STR_PAD_LEFT);
    }
}

