<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHalte extends Model
{
    protected $table = 'halte';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'nama_halte', 'latitude', 'longtitude', 'deleted'];

    public function getHalte()
    {
        return $this->where('deleted', 0)->findAll();
    }
    public function insertHalte($data)
    {
        return $this->insert($data);
    }
}
