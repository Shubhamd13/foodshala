<?php namespace App\Controllers;

class OrderController extends BaseController
{
	public function viewOrders(){
        $session = session();
            if($session->has('id')&&$session->has('type')){
                if($session->get('type')=="restaurant"){
                    $db = db_connect();
                    $restaurantid=$session->get('id');
                    $builder = $db->table('customers');
                    
                    $builder->select('customers.firstname,orders.*,restaurants.restaurantname,item.dishname');
                    $builder->join('orders', 'orders.cust_id = customers.id','inner');
                    $builder->join('restaurants', 'restaurants.id = orders.restaurant_id','inner');
                    $builder->join('item', 'orders.item_id = item.id','inner');
                    $builder->where('orders.restaurant_id',$restaurantid);
                    $builder->orderBy('id', 'DESC');
                    $query = $builder->get();
                    
                    $Orders=$query->getResult();
                    
                    echo view("ViewOrders",['Orders'=>$Orders]);
                    return;
                }elseif($session->get('type')=="customer"){
                    $db = db_connect();
                    $customerid=$session->get('id');
                    $builder = $db->table('customers');
                    
                    $builder->select('customers.firstname,orders.*,restaurants.restaurantname,item.dishname');
                    $builder->join('orders', 'orders.cust_id = customers.id','inner');
                    $builder->join('restaurants', 'restaurants.id = orders.restaurant_id','inner');
                    $builder->join('item', 'orders.item_id = item.id','inner');
                    $builder->where('customers.id',$customerid);
                    $builder->orderBy('id', 'DESC');
                    
                    $query = $builder->get();
                    
                    $Orders=$query->getResult();
                    echo view("ViewCustOrders",['Orders'=>$Orders]);
                    return;
                }
            }else{
                return redirect()->to(base_url('/'));
            }
    }
	public function order($ItemID)
	{
        try{
            $session = session();
            if($session->has('id')&&$session->has('type')){
                if($session->get('type')!="customer"){
                    return redirect()->to(base_url('/'));
                }
                date_default_timezone_set('Asia/Kolkata');
                $orderModel = model('App\Models\OrdersModel');
                $orderDetails=new \App\Entities\Order();
                $menuItemModel = model('App\Models\MenuItemModel');
                $menuItem=$menuItemModel->find($ItemID); //for restaurant_id
                
                $orderDetails->cust_id       =$session->get('id');
                $orderDetails->restaurant_id =$menuItem->restaurant_id;
                $orderDetails->item_id       =$ItemID;
                $orderDetails->created_at    =date('Y-m-d H:i:s');
                
                if ($orderModel->save($orderDetails) === false){
                    throw new Exception("Some Error Occured");
                }else{
                    //---Item Added---
                    return redirect()->to(base_url('/viewOrders'));
                    //return view("Login");
                }
            }else{
                    return redirect()->to(base_url('/login'));
            }
        }catch(Exception $e){
            echo 'Error: ' .$e->getMessage();
            echo 'Line: ' .$e->getLine();
        }
	}

	//--------------------------------------------------------------------

}
