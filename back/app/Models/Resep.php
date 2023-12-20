<?php

namespace App\Models;

use CodeIgniter\Model;

class Resep extends Model
{
    protected $table            = 'resep';
    protected $primaryKey       = 'id_resep';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['gambar_resep', 'judul_resep', 'penjelasan', 'bahan', 'langkah'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function updateResep($id, $data)
    {
        return $this->update($id, $data);
    }
}
