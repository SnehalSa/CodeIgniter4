<?php
namespace App\Controllers;
use App\Models\Products;
class ProductController extends BaseController
{
  public function index()
  {
    $products=new Products();
      $data['products']=$products->findAll();
      return view('products/index',$data);
     
  }
  public function create()
  {
      return view('products/create');
  }
  public function store()
  {
    $product=new Products();
    // $file=$this->request->getfile('image');
    // if($file->isvalid()&& !$file->hasMoved())
    // {
    //    $imageName=$file->getRandomName();
    // //   if($file->move(WRITEPATH.'uploads/'. $imageName))

    // //   {
    // //      echo '<p>File Uploaded Successfully</p>';      
    // //   }
    // //   else
    // //   {
    // //      echo $file->getErrorString()." ".$file->getError();
    // //   }
    // //return $_SERVER["DOCUMENT_ROOT"].'/myci/writable/uploads/';
    // $path=$this->request->getFile('image')->store($_SERVER["DOCUMENT_ROOT"].'/myci/writable/uploads', $imageName);
    
    // }
    if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                    $randdom = round(microtime(time() * 1000)) . rand(000, 999);
                    $file_extension1 = pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION);
                    $file_name1 = $randdom . '.' . $file_extension1;
                    if ($_FILES['image']["error"] <= 0) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].'/myci/uploads/' . $file_name1);
                        
                    } else {
                        $this->session->setFlashdata('error', 'Error! Try again!!!');
                    }
                }
    $data=[
'name'=>$this->request->getPost('name'),
'description'=>$this->request->getPost('description'),
'price'=>$this->request->getPost('price'),
'image'=> $file_name1,





    ];
    $product->save($data);
   // echo WRITEPATH."";
    return redirect()->to('/products')->with('status','Product data and image Saved');
    
  }
  public function edit($id)
  {
    $products=new Products();
      $data['product']=$products->find($id);
     return view('products/edit',$data);
  }


  public function update($id)
  {
 
    $products=new Products();
    $prod_item=$products->find($id);
    $old_img_name=$prod_item['image'];
    $file=$this->request->getFile('image');
 
    if($file->isValid()&& !$file->hasMoved())
    {
       
       if(file_exists("http://localhost/myci/uploads/".$old_img_name))
        {
           unlink("http://localhost/myci/uploads/".$old_img_name);
        }

      /*  $imageName=$file->getRandomName();
        $file->move('/myci/uploads/'. $imageName);*/
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
            $randdom = round(microtime(time() * 1000)) . rand(000, 999);
            $file_extension1 = pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION);
            $file_name1 = $randdom . '.' . $file_extension1;
            if ($_FILES['image']["error"] <= 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].'/myci/uploads/' . $file_name1);
                
            } else {
                $this->session->setFlashdata('error', 'Error! Try again!!!');
            }
        }

    }
    else{
      $randdom = round(microtime(time() * 1000)) . rand(000, 999);
      $file_extension1 = pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION);
      $file_name1 = $randdom . '.' . $file_extension1;
        $imageName=$old_img_name;


    }

    $data=[
        'name'=>$this->request->getPost('name'),
        'description'=>$this->request->getPost('description'),
        'price'=>$this->request->getPost('price'),
        'image'=> $file_name1 ,
        
        
        
        
        
            ];
            $products->update($id,$data);
     
            return redirect()->to('/products')->with('status','Product data and image Saved');
   
  }
  public function delete($id)
  {
    $products=new Products();
    
    $data=$products->find($id);
    //echo $data;
    //return json_encode($data);
    $imagefile=$data['image'];
     if(file_exists("http://localhost/myci/uploads/".$imagefile))
        {
            unlink("/myci/uploads/".$imagefile);
        }
    $products->delete($id);
    return redirect()->to(base_url('/products'))->with('status','Product deleted successfully');


  }
}
?>