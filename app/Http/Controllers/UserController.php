<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;


class UserController extends Controller
{

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['message', 'user not found'], 404);
        }

        if ( ($request->has('name')) || ($request->has('email')) || ($request->has('password')) ) {
            $user->avatar_url = $request->avatar_url;
            $user->email = $request->email;
            $user->password = $request->password;

            if($user->save() ){
                return (new UserResource($user))
                ->response()
                ->setStatusCode(400);
            }
        }else{
            $user->avatar_url = $request->avatar_url;
            if( $user->save() ){
                return (new UserResource($user))
                ->response()
                ->setStatusCode(200);
            }
        }
    }


    public function actors()
    {
        $users = User::withCount('event')
        ->orderBy('events_count', 'desc')
        ->orderBy('created_at', 'desc')
        ->orderBy('name')
        ->get();

        return (UserResource::collection($users))
        ->response()
        ->setStatusCode(200);
    }


    public function  streak()
    {
        $users = User::withCount('event')
        ->orderBy('events_count', 'desc')
        ->orderBy('created_at', 'desc')
        ->orderBy('name')
        ->get();

        return (UserResource::collection($users))
        ->response()
        ->setStatusCode(200);
        
    }



}
