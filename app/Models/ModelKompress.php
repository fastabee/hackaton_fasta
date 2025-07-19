<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKompress extends Model
{
    protected $table = 'kompress_images';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'kodegambar', 'nama_gambar', 'ukuran', 'status'];

    public function getKompress()
    {
        return $this->where('status', 0)->findAll();
    }
    public function insertKompress($data)
    {
        return $this->insert($data);
    }
}
