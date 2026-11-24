<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Order';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cust_id','restaurant_id','item_id','created_at'];
    protected $useTimestamps = false;

    protected $validationRules    = [
        'cust_id'       => 'required|integer',
        'restaurant_id' => 'required|integer',
        'item_id'       => 'required|integer',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}