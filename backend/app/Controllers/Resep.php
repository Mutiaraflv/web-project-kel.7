<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ResepModel;

class Resep extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new ResepModel();
        $data = $model->findAll();
        if (!$data) return $this->failNotFound('Data tidak ditemukan');
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ResepModel();
        $data = $model->find(['id_resep' => $id]);
        if (!$data) return $this->failNotFound('Data tidak ditemukan');
        return $this->respond($data[0]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'judul_resep' => $json->judul_resep,
            'penjelasan' => $json->penjelasan,
            'bahan' => $json->bahan,
            'langkah' => $json->langkah
        ];
        $model = new ResepModel();
        $resep = $model->insert($data);
        if (!$resep) return $this->fail('Gagal tersimpan', 400);
        return $this->respondCreated($resep);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'judul_resep' => $json->judul_resep,
            'penjelasan' => $json->penjelasan,
            'bahan' => $json->bahan,
            'langkah' => $json->langkah
        ];
        $model = new ResepModel();
        $cekId = $model->find(['id_resep' => $id]);
        if (!$cekId) return $this->fail('Data tidak ditemukan', 400);
        $resep = $model->update($id, $data);
        if (!$resep) return $this->fail('Gagal terupdate', 400);
        return $this->respond($resep);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new ResepModel();
        $cekId = $model->find(['id_resep' => $id]);
        if (!$cekId) return $this->fail('Data tidak ditemukan', 400);
        $resep = $model->delete($id);
        if (!$resep) return $this->fail('Gagal terhapus', 400);
        return $this->respondDeleted('Data berhasil terhapus');
    }
}
