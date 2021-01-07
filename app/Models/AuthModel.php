<?php

namespace App\Models;

use CodeIgniter\Model; 

class AuthModel extends Model{
    protected $table = 'users';
    protected $allowedfields = ['name', 'email', 'password', 'role'];
}