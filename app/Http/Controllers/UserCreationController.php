<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreationRequest;
use App\Http\Resources\TaskResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserCreationController extends Controller
{
    public function createUsers(UserCreationRequest $request){
        $response = array();
        

        try {
            $validate = $request->validated();
            $createUser = User::create($validate);
            if( $createUser){
                $response['message'] = "Users Created Successfull";
                $response['status'] = "success";
            }else{
                $response['message'] = "Users cannot be created at the moment";
                $response['status'] = "failed";
            }
           
          } catch (\Exception $e) {
            $response['message'] = "Users Email already exist";
            $response['status'] = "failed";
            
          }
          return new TaskResource($response);
    }
}
