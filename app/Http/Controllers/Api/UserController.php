<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Laravel\Passport\HasApiToken;

class UserController extends Controller
{

    public $successStatus = 200;
/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Shine')-> accessToken;

            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthday' => 'required',
            'gender_id' => 'required',
            'search' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
    if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
    $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Shine')-> accessToken;
        $success['name'] =  $user->name;
        $success['birthday'] =  $user->birthday;
        $success['gender_id'] =  $user->gender_id;
        $success['search'] =  $user->search;
    return response()->json(['success'=>$success], $this-> successStatus);
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();

        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function getEmail($email)
    {
        $response=false;
        $email = User::where('users.email',$email)->select('users.email')->count();

        if($email>0){$response=true;}

        return response()->json(['success' => $response], $this-> successStatus);
    }
}
