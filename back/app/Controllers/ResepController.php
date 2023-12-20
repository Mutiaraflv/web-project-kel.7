<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ResepController extends ResourceController
{
    protected $modelName = 'App\Models\Resep';
    protected $format    = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed    
     */
    public function index()
    {
        $data = $this->model->orderBy('id_resep', 'DESC')->findAll();

        // Tambahkan URL dasar ke path gambar
        foreach ($data as &$item) {
            $item['gambar_resep'] = base_url('gambar_resep/' . $item['gambar_resep']);
        }

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_resep = null)
    {
        $data = $this->model->find($id_resep);

        if ($data == null) {
            return $this->failNotFound('Resep tidak ditemukan');
        }

        // Tambahkan URL dasar ke path gambar
        $data['gambar_resep'] = base_url('gambar_resep/' . $data['gambar_resep']);

        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'gambar_resep'  => 'uploaded[gambar_resep]|max_size[gambar_resep,5120]|is_image[gambar_resep]',
            'judul_resep'   => 'required',
            'penjelasan'    => 'required',
            'bahan'         => 'required',
            'langkah'       => 'required',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Handle image upload
        $gambar     = $this->request->getFile('gambar_resep');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('gambar_resep', $namaGambar);

        $this->model->insert([
            'gambar_resep'  => $namaGambar,
            'judul_resep'   => esc($this->request->getVar('judul_resep')),
            'penjelasan'    => esc($this->request->getVar('penjelasan')),
            'bahan'         => esc($this->request->getVar('bahan')),
            'langkah'       => esc($this->request->getVar('langkah')),
        ]);

        $response = [
            'message' => 'Resep berhasil ditambahkan',
            'gambar_resep' => base_url('gambar_resep/' . $namaGambar), // Sertakan URL lengkap gambar
        ];

        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'gambar_resep'  => 'uploaded[gambar_resep]|max_size[gambar_resep,2048]|is_image[gambar_resep]',
            'judul_resep'   => 'required',
            'penjelasan'      => 'required',
            'bahan'           => 'required',
            'langkah'         => 'required',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $gambar = $this->request->getFile('gambar_resep');
        $namaGambar = $gambar->getName();
        $gambar->move('gambar_resep', $namaGambar);

        $gambarResep = $namaGambar ? $namaGambar : $this->request->getVar('gambar_resep_lama');

        $this->model->updateResep($id, [
            'gambar_resep'  => $gambarResep,
            'judul_resep'   => esc($this->request->getVar('judul_resep')),
            'penjelasan'    => esc($this->request->getVar('penjelasan')),
            'bahan'         => esc($this->request->getVar('bahan')),
            'langkah'       => esc($this->request->getVar('langkah')),
        ]);

        $response = [
            'message' => 'Resep berhasil diupdate'
        ];

        return $this->respond($response);
    }
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id_resep = null)
    {
        $gambar = $this->model->find($id_resep);
        if ($gambar['gambar_resep'] != '') {
            unlink('gambar_resep/' . $gambar['gambar_resep']);
        }

        $this->model->delete($id_resep);

        $response = [
            'message' => 'Resep berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
