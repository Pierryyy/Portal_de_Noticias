<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticesModel extends Model {
    //Atributos de Configuração
    protected $table = 'notices';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'description', 'img'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updateField = 'updated_at';
    protected $deleteField = 'deleted_at';

    // METODO GET
    public function getNotices($id=false){
        if($id === false){
            return $this->findAll();
        } else {
            return $this ->asArray()
            ->where(['id' => $id])
            ->first();
        }
    }
}