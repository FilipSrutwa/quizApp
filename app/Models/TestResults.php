<?php

namespace App\Models;

use CodeIgniter\Model;

class TestResults extends Model
{
    protected $table      = 'tests_results';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['ID', 'Test_ID', 'Acc_ID', 'Points', 'Max_points'];

    protected $useTimestamps = false;
    //protected $createdField  = 'Created_at';
    //protected $updatedField  = 'Updated_at';
    //protected $deletedField  = 'Deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
}
