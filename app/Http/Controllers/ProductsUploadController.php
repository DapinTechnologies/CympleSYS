<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductsUpload;

class ProductsUploadController extends Controller
{
    //this controller will take all the items uploaded and save them in the
    //db
    public function uploadItem(Request $req){
        $validator=Validator::make($req->all(),[
            'type'=>'required',
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'product_type'=>'required',
            'price'=>'required',
            'charge'=>'required',
            'charge_type'=>'required',
            'images'=>'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'sucess'=>false,
                'message' => $validator->errors()

            ]);
        }
        //if the request has everything attached
        //then store the items into the database.
        $product=new ProductsUpload();
        $product->type=$req->type;
        $product->name=$req->name;
        $product->description=$req->description;
        $product->category=$req->category;
        $product->product_type=$req->product_type;
        $product->price=$req->price;
        $product->charge=$req->charge;
        $product->charge_type=$req->charge_type;
        $product->images=$req->images;
        $result=$product->save();

        if(!$result){
            return response()->json([
                'success'=>false,
                'message'=>$result->errors()
            ]);
        }
        return response()->json([
            'success'=>true,
            'productInfo'=>$product
        ]);
    }
    public function removeItem($id){
        //remove the item using it's id.
        $item=ProductsUpload::find($id);
        $result=$item->delete();
        
        //check if the remove was successful.
        if($result){
            return response()->json([
                "success"=>true,
                "message"=>'Successfully deleted'
            ]);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>$result->errors()
            ]);
        }
    }

    public function listItems($id=null){
      //handle null values. if the id is null return all.
      //check if the id exists or not
        return $id?ProductsUpload::find($id):ProductsUpload::all();
    }
    public function updateItem(Request $req){
        $product=ProductsUpload::find($req->id);
        $product->type=$req->type;
        $product->name=$req->name;
        $product->description=$req->description;
        $product->category=$req->category;
        $product->product_type=$req->product_type;
        $product->price=$req->price;
        $product->charge=$req->charge;
        $product->charge_type=$req->charge_type;
        $product->images=$req->images;
        $result=$product->save();

        if(!$result){
            return response()->json([
                'success'=>false,
                'message'=>'could not save to db'
            ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>$product
        ]);
    
        
    }
        //fetch the data
        public function search($name=null){
            if($name!=null){
                return ProductsUpload::where("name","like","%".$name."%")->get();
            }else{
                return ProductsUpload::all();
    
            }
            
        }
}
