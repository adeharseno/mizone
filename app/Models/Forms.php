<?php namespace App\Models;

use CodeIgniter\Model;
class Forms extends Model {
    protected $table = 'forms';

    public function insertForms($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}