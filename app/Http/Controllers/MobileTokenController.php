<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BusinessData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MobileTokenController extends Controller
{
    //register the user to the db
    public function uregister(Request $req){
        //validate the data being sent to the api
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'device_name' => 'required',
            'password'=>'required'
        ]);

        //check the validation
        if($validator->fails()){
            return response()->json([
                'sucess'=>false,
                'message' => $validator->errors()
            ]);
        }
        try {
            //write your codes here
            $user=new User();
            $user->name=$req->name;
            $user->email=$req->email;
            $user->phone=$req->phone;
            $user->device_name=$req->device_name;
            $user->password=bcrypt($req->password);
            $user->save();

            $meso='User created successfully';
            return $this->tokenVerif($req,$meso);
            }catch (Throwable $e) {
                report($e);
                return false;
            }
            
    }
    public function tokenVerif(Request $req, $meso){
        $user=User::where('email',$req->email)->first();

        $tokenResult=$user->createToken($req->device_name)->plainTextToken;


        //return the response of the request.
        return response()->json([
            'sucess'=>true,
            "message"=>$meso,
            'token'=>$tokenResult,
            'userInfo'=>$user
        ]);
    }
    public function login(Request $req){
                //validate the data being sent to the api
                $validator=Validator::make($req->all(),[
                    'email'=>'required|email',
                    'password'=>'required',
                    'device_name'=>'required',
                ]);
        
                //check the validation
                if($validator->fails()){
                    return response()->json([
                        'success'=>false,
                        'message' => $validator->errors()
                    ]);
                }
                $cred=request(['email','password']);
                if(!Auth::attempt($cred)){
                    return response()->json([
                        'success'=>false,
                        'message'=>'Invalid credentials.'
                    ]);
                }
                $meso='Login successful';
                return $this->tokenVerif($req,$meso);



    }
    //this function will register the business accounts.
    public function bregister(Request $req){
         //validate the data being sent to the api
         $validator=Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'device_name' => 'required',
            'account_type'=>'required',
            'auth_type'=>'required',
            'push_token'=>'required',
            'business_name'=>'required',
            'business_mode'=>'required',
            'business_type'=>'required',
            'products_type'=>'required',
            'business_reg_no'=>'required',
            'category'=>'required',
            'building_name'=>'required',
            'place_name'=>'required',
            'city_name'=>'required',
            'county'=>'required',
            'store_front_link'=>'required',
            'password'=>'required'
        ]);

        //check the validation
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'message' => $validator->errors()
            ]);
        }
        //define the models to save the data.
        $user=new User();
        $biz=new BusinessData();

        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->device_name=$req->device_name;
        $user->account_type=$req->account_type;
        $user->auth_type=$req->auth_type;
        $user->push_token=$req->push_token;
        $user->password=bcrypt($req->password);
        $user->save();

        $biz->user_id=BusinessData::find(User::class);
        $biz->business_name=$req->business_name;
        $biz->business_mode=$req->business_mode;
        $biz->business_type=$req->business_type;
        $biz->products_type=$req->products_type;
        $biz->business_reg_no=$req->business_reg_no;
        $biz->category=$req->category;
        $biz->building_name=$req->building_name;
        $biz->place_name=$req->place_name;
        $biz->city_name=$req->city_name;
        $biz->county=$req->county;
        $biz->gps_data=$req->gps_data;
        $biz->store_front_link=$req->store_front_link;
        $biz->save();


        $meso='Business Account created successfully';
        return $this->tokenVerif($req,$meso);

    }



    public function logout(Request $req){
        $req->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Token deleted successfully'
        ]);
    }
}
