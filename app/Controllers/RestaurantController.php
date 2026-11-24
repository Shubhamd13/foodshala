<?php namespace App\Controllers;

class RestaurantController extends BaseController
{
	public function index()
	{
        $session = session();
        if($session->has('id')&&$session->has('type')){
            if($session->get('type')=="restaurant"){
                return view('AddItem');
            }else{
                return redirect()->to(base_url('/'));
            }
        }else{
            return redirect()->to(base_url('/'));
        }
	}
    public function addItem(){
        try{
            $session = session();
            if($session->has('id')&&$session->has('type')){
                if($this->request->getMethod()!="post" || $session->get('type')!="restaurant"){
                    return redirect()->to(base_url('/'));
                }
                $menuItemModel = model('App\Models\MenuItemModel');
                $itemDetails=new \App\Entities\MenuItem();
                
                $itemDetails->dishname    =$this->request->getPost("dishname",FILTER_SANITIZE_STRING);
                $itemDetails->description =$this->request->getPost("description",FILTER_SANITIZE_STRING);
                $itemDetails->price       =$this->request->getPost("price");
                $itemDetails->preference  =$this->request->getPost("preference");
                $itemDetails->restaurant_id =$session->get('id');
                
                if($itemDetails->preference==NULL){
                    $itemDetails->preference="Veg";
                }
                if ($menuItemModel->save($itemDetails) === false){
                    return view("AddItem",['error'=>$menuItemModel->errors(),'values'=>$itemDetails->getAttributes()]);
                }else{
                    //---Item Added---
                    return redirect()->to(base_url('/viewItems'));
                }
            }else{
                    return redirect()->to(base_url('/login'));
            }
        }catch(\Exception $e){
            echo 'Error: ' .$e->getMessage();
            echo 'Line: ' .$e->getLine();
        }
    }
    public function viewItems(){
        try{
            $session = session();
            if($session->has('id')&&$session->has('type')){
                if($this->request->getMethod()!="get" || $session->get('type')!="restaurant"){
                    return redirect()->to(base_url('/'));
                }
                $menuItemModel = model('App\Models\MenuItemModel');
                $menuItems=$menuItemModel->where("restaurant_id",$session->get('id'))->findAll();
                echo view("viewItems",['menuItems'=>$menuItems]);
            }else{
                return redirect()->to(base_url('/'));
            }
        }catch(\Exception $e){
            echo 'Error: ' .$e->getMessage();
            echo 'Line: ' .$e->getLine();
        }
        
    }
	//--------------------------------------------------------------------

}