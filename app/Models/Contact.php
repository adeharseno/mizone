<?php namespace App\Models;

use CodeIgniter\Model;
class Contact extends Model {
    protected $table = 'contacts';

    public function insertContact($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}