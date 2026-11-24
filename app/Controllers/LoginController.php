<?php namespace App\Controllers;

class LoginController extends BaseController
{
	public function index()
	{
        $session = session();
        if($session->has('id')&&$session->has('type')){
            //Already Logged In
            return redirect()->to(base_url('/'));
        }else{
            return view('login');
        }
	}
    public function login($type){
        if($type=="customer"){
            try{
                if($this->request->getMethod()!="post"){
                    throw new \Exception("Invalid Request Method");
                }
                $customerModel = model('App\Models\CustomerModel');
                $loginDetails=new \stdClass();
                
                $loginDetails->email    =$this->request->getPost("email",FILTER_SANITIZE_EMAIL);
                $loginDetails->password =$this->request->getPost("password");
                
                $customer=$customerModel->where("email",$loginDetails->email)->findAll(1);
                if(!empty($customer)){
                    $customer=$customer[0];
                    if($customer->verifyPassword($loginDetails->password)===true){
                        $session = session();
                        //set session individually
                        $session->set("id",$customer->id);
                        $session->set("type","customer");
                        return redirect()->to(base_url('/'));
                    }else{
                        $error['password']="Invalid Password";
                        throw new \Exception("Invalid Password");
                    }
                }else{
                    $error['email']="Invalid Email-Id";
                    throw new \Exception("Invalid Email-Id");
                }
            }catch(\Exception $e){
                return view("login",['error'=>$error,'values'=>get_object_vars($loginDetails),'type'=>$type]);
            }
            
        }elseif ($type=="restaurant"){
            try{
                if($this->request->getMethod()!="post"){
                    throw new \Exception("Invalid Request Method");
                }
                $restaurantModel = model('App\Models\RestaurantModel');
                $loginDetails=new \stdClass();
                
                $loginDetails->email1    =$this->request->getPost("email",FILTER_SANITIZE_EMAIL);
                $loginDetails->password1 =$this->request->getPost("password1");
                
                $restaurant=$restaurantModel->where("email",$loginDetails->email1)->findAll(1);
                if(!empty($restaurant)){
                    $restaurant=$restaurant[0];
                    if($restaurant->verifyPassword($loginDetails->password1)===true){
                        $session = session();
                        //set session individually
                        $session->set("id",$restaurant->id);
                        $session->set("type","restaurant");
                        return redirect()->to(base_url('/'));
                    }else{
                        $error['password1']="Invalid Password";
                        throw new \Exception("Invalid Password");
                    }
                }else{
                    $error['email1']="Invalid Email-Id";
                    throw new \Exception("Invalid Email-Id");
                }
            }catch(\Exception $e){
                return view("login",['error'=>$error,'values'=>get_object_vars($loginDetails),'type'=>$type]);
            }
        }else{
            return view('errors/html/error_404');
        }
    }
    public function logout(){
        $session = session();
        if($session->has('id')&&$session->has('type')){
            $session->remove('id');
            $session->remove('type');
            return redirect()->to(base_url('/'));
        }else{
            return view('errors/html/error_404');
        }
    }
	//--------------------------------------------------------------------

}