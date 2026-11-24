<?php namespace App\Models;

use CodeIgniter\Model;

class RestaurantModel extends Model
{
    protected $table      = 'restaurants';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Restaurant';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['restaurantname', 'email','password','fssain','address'];

    protected $useTimestamps = false;

    protected $validationRules    = [
        'restaurantname'=> 'required|alpha_numeric_space|max_length[20]',
        'email'         => 'required|valid_email|is_unique[restaurants.email]',
        'password'      => 'required|min_length[6]',
        'fssain'        => 'required',
        'address'       => 'required|max_length[50]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}