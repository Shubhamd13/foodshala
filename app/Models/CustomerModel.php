<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Customer';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['firstname','lastname', 'email','password','address','preference'];

    protected $useTimestamps = false;

    protected $validationRules    = [
        'firstname'   => 'required|alpha_numeric_space',
        'email'       => 'required|valid_email|is_unique[customers.email]',
        'password'    => 'required|min_length[6]',
        'address'     => 'required',
        'preference'  => 'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}