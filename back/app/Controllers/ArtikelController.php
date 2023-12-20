<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ArtikelController extends ResourceController
{
    protected $modelName = 'App\Models\Artikel';
    protected $format    = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed    
     */
    public function index()
    {
        $data = $this->model->orderBy('id_artikel', 'DESC')->findAll();

        foreach ($data as &$item) {
            $item['gambar_artikel'] = base_url('gambar_artikel/' . $item['gambar_artikel']);
        }

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_artikel = null)
    {
        $data = $this->model->find($id_artikel);

        if ($data == null) {
            return $this->failNotFound('Artikel tidak ditemukan');
        }

        $data['gambar_artikel'] = base_url('gambar_artikel/' . $data['gambar_artikel']);

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
            'gambar_artikel'  => 'uploaded[gambar_artikel]|max_size[gambar_artikel,2048]|is_image[gambar_artikel]',
            'judul_artikel'   => 'required',
            'penjelasan'    => 'required', 
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Handle image upload
        $gambar     = $this->request->getFile('gambar_artikel');
        $namaGambar = $gambar->getName();
        $gambar->move('gambar_artikel', $namaGambar);

        $this->model->insert([
            'gambar_artikel'  => $namaGambar,
            'judul_artikel'   => esc($this->request->getVar('judul_artikel')),
            'penjelasan'    => esc($this->request->getVar('penjelasan')),
        ]);

        $response = [
            'message' => 'Artikel berhasil ditambahkan'
        ];

        return $this->respondCreated($response);
    }


    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id_artikel = null)
    {
        $gambar = $this->model->find($id_artikel);
        if ($gambar['gambar_artikel'] != '') {
            unlink('gambar_artikel/' . $gambar['gambar_artikel']);
        }

        $this->model->delete($id_artikel);

        $response = [
            'message' => 'Artikel berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
    /**
 * Update the specified resource object, from "posted" properties
 *
 * @param $id_artikel
 * @return mixed
 */
    public function update($id = null)
    {
        $rules = $this->validate([
            'gambar_artikel'  => 'uploaded[gambar_artikel]|max_size[gambar_artikel,2048]|is_image[gambar_artikel]',
            'judul_artikel'   => 'required',
            'penjelasan'      => 'required',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Handle image upload
        $gambar = $this->request->getFile('gambar_artikel');
        $namaGambar = $gambar->getName();
        $gambar->move('gambar_artikel', $namaGambar);

        // Jika ada gambar baru diupload, gunakan nama gambar baru. Jika tidak, gunakan nama gambar lama
        $gambarArtikel = $namaGambar ? $namaGambar : $this->request->getVar('gambar_artikel_lama');

        $this->model->updateArtikel($id, [
            'gambar_artikel'  => $gambarArtikel,
            'judul_artikel'   => esc($this->request->getVar('judul_artikel')),
            'penjelasan'      => esc($this->request->getVar('penjelasan')),
        ]);

        $response = [
            'message' => 'Artikel berhasil diupdate'
        ];

        return $this->respond($response);
    }


}
