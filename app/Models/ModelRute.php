<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHalte extends Model
{
    protected $table = 'rute';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['idrute', 'idhalte', 'ruteke'];

    public function getRute()
    {
        return $this->where('deleted', 0)->findAll();
    }
    public function insertRute($data)
    {
        return $this->insert($data);
    }
}
