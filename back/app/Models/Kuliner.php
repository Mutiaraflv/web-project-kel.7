<?php

namespace App\Models;

use CodeIgniter\Model;

class Kuliner extends Model
{
    protected $table            = 'kuliner';
    protected $primaryKey       = 'id_kuliner';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['gambar_kuliner', 'nama_kuliner', 'penjelasan_singkat', 'lokasi', 'jam_buka', 'estimasi_makan', 'tentang', 'maps'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
