<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    public function index()
    {
        $model = new CommentModel();
        $comments = $model->findAll();
        return $this->response->setJSON($comments);
    }

    public function create()
    {
        $model = new CommentModel();
        $data = $this->request->getJSON(true);

        if ($model->save($data)) {
            return $this->response->setStatusCode(201)->setJSON(['message' => 'Comment created successfully']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['message' => 'Error creating comment']);
        }
    }
}
