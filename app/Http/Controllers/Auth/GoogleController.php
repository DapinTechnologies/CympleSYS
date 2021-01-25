<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback()
    {
        // $googleUser=Socialite::driver('google')->user();

        // //create a new user in the db
        // $user=User::create([
        //     'email'=>$googleUser->getEmail(),
        //     'name'=>$googleUser->getName(),
        //     'provider_id'=>$googleUser->getId(),

        // ]);
        // //log the user in 
        // auth()->login($user, true);

        // //redirect to the dashboard
        // return redirect('dashboard');

        try {
    
            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('dashboard');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/dashboard');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
