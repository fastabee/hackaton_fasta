<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRute extends Model
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

    public function getJoinedHalteRute()
    {
        return $this->select('rute.ruteke, halte.id, halte.nama_halte, halte.latitude, halte.longtitude')
            ->join('halte', 'rute.idhalte = halte.id')
            ->orderBy('ruteke', 'ASC')
            ->findAll();
    }
}
