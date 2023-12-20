<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class KulinerController extends ResourceController
{
    protected $modelName = 'App\Models\Kuliner';
    protected $format    = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed    
     */
    public function index()
    {
        $data = $this->model->orderBy('id_kuliner', 'DESC')->findAll();

        // Tambahkan URL dasar ke path gambar
        foreach ($data as &$item) {
            $item['gambar_kuliner'] = base_url('gambar_kuliner/' . $item['gambar_kuliner']);
        }

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_kuliner = null)
    {
        $data = $this->model->find($id_kuliner);

        if ($data == null) {
            return $this->failNotFound('kuliner tidak ditemukan');
        }

        // Tambahkan URL dasar ke path gambar
        $data['gambar_kuliner'] = base_url('gambar_kuliner/' . $data['gambar_kuliner']);

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
            'gambar_kuliner'     => 'uploaded[gambar_kuliner]|max_size[gambar_kuliner,5120]|is_image[gambar_kuliner]',
            'nama_kuliner'       => 'required',
            'penjelasan_singkat' => 'required',
            'lokasi'             => 'required',
            'jam_buka'           => 'required',
            'estimasi_makan'     => 'required',
            'tentang'            => 'required',
            'maps'               => 'required',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Handle image upload
        $gambar     = $this->request->getFile('gambar_kuliner');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('gambar_kuliner', $namaGambar);

        $this->model->insert([
            'gambar_kuliner'        => $namaGambar,
            'nama_kuliner'          => esc($this->request->getVar('nama_kuliner')),
            'penjelasan_singkat'    => esc($this->request->getVar('penjelasan_singkat')),
            'lokasi'                => esc($this->request->getVar('lokasi')),
            'jam_buka'              => esc($this->request->getVar('jam_buka')),
            'estimasi_makan'        => esc($this->request->getVar('estimasi_makan')),
            'tentang'               => esc($this->request->getVar('tentang')),
            'maps'                  => esc($this->request->getVar('maps')),
        ]);

        $response = [
            'message' => 'Kuliner berhasil ditambahkan',
            'gambar_kuliner' => base_url('gambar_kuliner/' . $namaGambar), // Sertakan URL lengkap gambar
        ];

        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id_kuliner = null)
    {
        // Validasi data
        $rules = $this->validate([
            'gambar_kuliner'     => 'uploaded[gambar_kuliner]|max_size[gambar_kuliner,5120]|is_image[gambar_kuliner]',
            'nama_kuliner'       => 'required',
            'penjelasan_singkat' => 'required',
            'lokasi'             => 'required',
            'jam_buka'           => 'required',
            'estimasi_makan'     => 'required',
            'tentang'            => 'required',
            'maps'               => 'required',
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Ambil data kuliner berdasarkan ID
        $kuliner = $this->model->find($id_kuliner);

        if ($kuliner === null) {
            return $this->failNotFound('Kuliner tidak ditemukan');
        }

        // Handle gambar baru
        $gambarBaru = $this->request->getFile('gambar_kuliner');
        if ($gambarBaru->isValid() && !$gambarBaru->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($kuliner['gambar_kuliner'] != '') {
                unlink('gambar_kuliner/' . $kuliner['gambar_kuliner']);
            }

            // Pindahkan gambar baru ke folder gambar_kuliner
            $namaGambarBaru = $gambarBaru->getRandomName();
            $gambarBaru->move('gambar_kuliner', $namaGambarBaru);

            // Update data kuliner dengan gambar baru
            $this->model->update($id_kuliner, [
                'gambar_kuliner'        => $namaGambarBaru,
                'nama_kuliner'          => esc($this->request->getVar('nama_kuliner')),
                'penjelasan_singkat'    => esc($this->request->getVar('penjelasan_singkat')),
                'lokasi'                => esc($this->request->getVar('lokasi')),
                'jam_buka'              => esc($this->request->getVar('jam_buka')),
                'estimasi_makan'        => esc($this->request->getVar('estimasi_makan')),
                'tentang'               => esc($this->request->getVar('tentang')),
                'maps'                  => esc($this->request->getVar('maps')),
            ]);

            $response = [
                'message' => 'Kuliner berhasil diubah',
                'gambar_kuliner' => base_url('gambar_kuliner/' . $namaGambarBaru), // Sertakan URL lengkap gambar
            ];
        } else {
            // Jika tidak ada gambar baru, update data kuliner tanpa mengubah gambar
            $this->model->update($id_kuliner, [
                'nama_kuliner'          => esc($this->request->getVar('nama_kuliner')),
                'penjelasan_singkat'    => esc($this->request->getVar('penjelasan_singkat')),
                'lokasi'                => esc($this->request->getVar('lokasi')),
                'jam_buka'              => esc($this->request->getVar('jam_buka')),
                'estimasi_makan'        => esc($this->request->getVar('estimasi_makan')),
                'tentang'               => esc($this->request->getVar('tentang')),
                'maps'                  => esc($this->request->getVar('maps')),
            ]);

            $response = [
                'message' => 'Kuliner berhasil diubah tanpa mengubah gambar'
            ];
        }

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id_kuliner = null)
    {
        $gambar = $this->model->find($id_kuliner);
        if ($gambar['gambar_kuliner'] != '') {
            unlink('gambar_kuliner/' . $gambar['gambar_kuliner']);
        }

        $this->model->delete($id_kuliner);

        $response = [
            'message' => 'Kuliner berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
