<?php namespace App\Database\Seeds;

class Notices extends \CodeIgniter\Database\Seeder{
    public function run() {
        $data = [
            'title' => 'Titulo da noticia 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquam luctus lorem, vitae iaculis nunc euismod in. Nulla nunc leo, condimentum at sem vitae, pharetra lacinia nunc. Ut ultrices, ante nec mattis ornare, erat est interdum erat, non cursus est leo vel mi. Curabitur vitae tincidunt eros. Nam elit nibh, mattis vel facilisis vel, sagittis sit amet massa. Nunc eleifend, sem quis eleifend pharetra, sapien ex ultrices augue, dictum tristique lacus tellus sit amet lacus. Nullam eleifend arcu eget maximus pretium. Donec in porta ante. Suspendisse lobortis urna quis sapien imperdiet accumsan.',
            'author' => 'Pierry Derungs'
        ];
        $this->db->table('notices')->insert($data);
    }
}