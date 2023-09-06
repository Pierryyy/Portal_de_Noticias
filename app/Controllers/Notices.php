<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NoticesModel;

$request = \Config\Services::request();

class Notices extends Controller
{

    public function index()
    {

        $model = new NoticesModel();

        $data = [
            'title' => 'Últimas Noticias',
            'notices' => $model->paginate(3),
            'pager' => $model->pager,
            'sesson' => \Config\Services::session(),
        ];
        echo view('teamplates/header', $data);
        echo view('pages/notices', $data);
        echo view('teamplates/footer');
    }
    public function item($id = NULL)
    {

        $model = new NoticesModel();

        $data = ['notices' => $model->getNotices($id)];
        if (empty($data['notices'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com id:' . $id);
        }

        $data['title'] = $data['notices']['title'];

        echo view('teamplates/header', $data);
        echo view('pages/notice', $data);
        echo view('teamplates/footer');
    }
    public function insert()
    {
        $data['session'] = \Config\Services::session();
        if (!$data['session']->get('logged_in')) {
            return redirect('login');
        }

        helper('form');
        $data['title'] = 'Inserir Notícias';

        echo view('teamplates/header', $data);
        echo view('pages/notice_save', $data);
        echo view('teamplates/footer');
    }

    public function edit($id = NULL)
    {
        $model = new NoticesModel();

        $data = [
            'title' => 'Editar Notícia',
            'notices' => $model->getNotices($id),
            'session' => \Config\Services::session()
        ];
        if (!$data['session']->get('logged_in')) {
            return redirect('login');
        }
        if (empty($data['notices'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel encontrar a noticia com id:' . $id);
        }

        $data['title'] = $data['notices']['title'];

        echo view('teamplates/header', $data);
        echo view('pages/notice_save', $data);
        echo view('teamplates/footer');
    }

    public function save()
    {
        $data['session'] = \Config\Services::session();
        if (!$data['session']->get('logged_in')) {
            return redirect('login');
        }
        helper('form');
        $model = new NoticesModel();

        if ($this->validate([
            'title' => ['label' => 'Título', 'rules' => 'required|min_length[3]|max_length[100]'],
            'author' => ['label' => 'Autor', 'rules' => 'required|min_length[3]|max_length[100]'],
            'description' => ['label' => 'Descriçao', 'rules' => 'required|min_length[3]']
        ])) {
            $request = \Config\Services::request();
            $id = $request->getVar('id');
            $title = $request->getVar('title');
            $author = $request->getVar('author');
            $description = $request->getVar('description');
            $img = $request->getFile('img');

            if (!$img->isValid()) {
                $model->save([
                    'id' => $id,
                    'title' => $title,
                    'author' => $author,
                    'description' => $description,
                ]);
                return redirect(('notices'));
            } else {
                $validateIMG = $this->validate([
                    'img' => [
                        'uploaded[img]',
                        'mime_in[img,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img,4096]',
                    ],
                ]);

                if ($validateIMG) {
                    $newName = $img->getRandomName();
                    $img->move('img/notices', $newName);

                    $model->save([
                        'id' => $id,
                        'title' => $title,
                        'author' => $author,
                        'description' => $description,
                        'img' => $newName,
                    ]);
                    return redirect('notices');
                } else {
                    $data['title'] = 'Erro ao gravar a notícia';

                    echo view('teamplates/header', $data);
                    echo view('pages/notice_save');
                    echo view('teamplates/footer');
                }
            }
        } else {
            $data['title'] = 'Erro ao gravar a notícia';
            echo view('teamplates/header', $data);
            echo view('pages/notice_save', $data);
            echo view('teamplates/footer');
        }
    }

    public function delete($id = NULL)
    {
        $data['session'] = \Config\Services::session();
        if (!$data['session']->get('logged_in')) {
            return redirect('login');
        }
        $model = new NoticesModel();
        $model->delete($id);
        return redirect('notices');
    }
}
