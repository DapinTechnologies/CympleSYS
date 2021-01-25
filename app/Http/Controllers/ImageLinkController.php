<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class ImageLinkController extends Controller
{
    //
     //send an image and the response is its link
     public function uploadImage(Request $req){
        $validator=Validator::make($req->all(),[
            'image'=>'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return response([
                $errors = $validator->errors()
            ],500);
        }
        $uploadFolder='storefronts';
        // $image=$req->file('image');
        $image_uploaded_path=$image->store($uploadFolder, 'public');
        // Storage::putFile('photos', new File($image_uploaded_path), 'public');
        // $uploadedImageResponse=array(
        //     "image_name"=>basename($image_uploaded_path),
        //     "image_url"=>Storage::url($image_uploaded_path),
        //     "mime"=>$image->getClientMimeType()
        // );
        return response($uploadedImageResponse, 200);
    }
}
