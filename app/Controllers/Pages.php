<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index(){
        return view('welcome_message');
    }

    public function show($page = 'home') {
        if(! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        $data['cripto'] = \Config\Services::encrypter();   
        $data['cache'] = \Config\Services::cache();
        echo view('teamplates/header',$data);
        echo view('pages/'.$page);
        echo view('teamplates/footer');
    }

    public function cleanCache() {
        $data['cache'] = \Config\Services::cache();
        $data['cache']->delete('hideArea');

        return redirect()->back()->withInput();
    }
    public function addCache() {
        $data['cache'] = \Config\Services::cache();
        $data['cache']->increment('valueCache', 1);

        return redirect()->back()->withInput();
    }
    public function removeCache() {
        $data['cache'] = \Config\Services::cache();
        $data['cache']->decrement('valueCache', 1);

        return redirect()->back()->withInput();
    }
}
