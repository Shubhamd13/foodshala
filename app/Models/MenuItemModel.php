<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'item';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\MenuItem';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['dishname','description', 'price','preference','restaurant_id'];

    protected $useTimestamps = false;

    protected $validationRules    = [
        'dishname'      => 'required|alpha_numeric_space|max_length[20]|min_length[3]',
        'description'   => 'required|max_length[50]|min_length[3]',
        'price'         => 'required|integer',
        'preference'    => 'required',
        'restaurant_id' => 'required|integer',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}