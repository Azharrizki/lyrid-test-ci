<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Dashboard extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'employee' => $this->db->table('employees')->countAllResults(),
            'user' => $this->db->table('users')->countAllResults(),
        ];

        return view('pages/dashboard/index', $data);
    }
}
