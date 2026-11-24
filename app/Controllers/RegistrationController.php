<?php namespace App\Controllers;

class RegistrationController extends BaseController
{
	public function index($type='None')
	{
        //Check if already logged in
        $session = session();
        if($session->has('id')&&$session->has('type')){
            return redirect()->to(base_url('/'));
        }
        if($type=="customer"){
            return view('CustomerRegister');
        }elseif ($type=="restaurant"){
            return view('RestaurantRegister');
        }else{
            return view('errors/html/error_404');            
        }
    }
    public function registerRestaurant(){
        try{
            if($this->request->getMethod()!="post"){
                throw new \Exception("Invalid Request Method");
            }
            $restaurantModel = model('App\Models\RestaurantModel');
            $restaurant=new \App\Entities\Restaurant();
            
            $restaurant->restaurantname=$this->request->getPost("restaurantname",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $restaurant->email    =$this->request->getPost("email",FILTER_SANITIZE_EMAIL);
            $restaurant->password =$this->request->getPost("password");
            $restaurant->address  =$this->request->getPost("address",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $restaurant->fssain   =$this->request->getPost("fssain",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if ($restaurantModel->save($restaurant) === false){
                $restaurant=$restaurant->getAttributes();
                $restaurant['password']="";
                return view("RestaurantRegister",['error'=>$restaurantModel->errors(),'values'=>$restaurant]);
            }else{
                //---USER Added---
                return redirect()->to(base_url('/'));
            }
        }catch(\Exception $e){
            echo 'Error: ' .$e->getMessage();
        }
    }
    public function registerCustomer(){
        try{
            if($this->request->getMethod()!="post"){
                throw new \Exception("Invalid Request Method");
            }
            $customerModel = model('App\Models\CustomerModel');
            $customer=new \App\Entities\Customer();
            
            $customer->firstname=$this->request->getPost("firstname",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $customer->lastname =$this->request->getPost("lastname",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $customer->email    =$this->request->getPost("email",FILTER_SANITIZE_EMAIL);
            $customer->password =$this->request->getPost("password");
            $customer->address  =$this->request->getPost("address",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $customer->preference  =$this->request->getPost("preference",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($customer->preference==NULL){
                $customer->preference="Veg";
            }
            if ($customerModel->save($customer) === false){
                $customer=$customer->getAttributes();
                $customer['password']="";
                return view("CustomerRegister",['error'=>$customerModel->errors(),'values'=>$customer]);
            }else{
                //---Restaurant Added---
                return redirect()->to(base_url('/'));
            }
        }catch(\Exception $e){
            echo 'Error: ' .$e->getMessage();
        }
    }
	//--------------------------------------------------------------------

}