<?php namespace App\Controllers;

class MenuController extends BaseController
{
	public function index()
	{
        try{
            $session = session();
            if($session->has('id')&&$session->has('type')){
                $id   = $session->get('id');
                $type = $session->get('type');
                if($type == "customer"){
                    $customerModel = model('App\Models\CustomerModel');
                    $customer = $customerModel->find($id);
                    $name=$customer->firstname;
                }else{
                    $restaurantModel = model('App\Models\RestaurantModel');
                    $restaurant=$restaurantModel->find($id);
                    $name=$restaurant->restaurantname;
                }
            }else{
                $type = "loggedOut";
                $name="None";
            }
            $db = db_connect();
            $builder = $db->table('item');
            $builder->select('item.*,restaurants.restaurantname');
            $builder->join('restaurants', 'item.restaurant_id = restaurants.id','inner');
            $query = $builder->get();
            $menuItems = $query->getResult();
            
            return view("Menu",['menuItems'=>$menuItems,'type'=>$type,'name'=>$name]);
        }catch(\Exception $e){
            echo 'Error: ' .$e->getMessage();
            echo 'Line: ' .$e->getLine();
            return;
        }
	}

	//--------------------------------------------------------------------

}
