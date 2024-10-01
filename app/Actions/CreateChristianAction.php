<?php

namespace App\Actions;
use App\Models\Address\Municipality;
use App\Models\User;
use Carbon\Carbon;

class CreateChristianAction
{
    public function execute(array $data)
    {
        dd($data);
        $date = Carbon::createFromFormat('Y-m-d', $data['birth_date'])->toDateString();


        $municipality = Municipality::find($data['municipality_id'])->first();
        if (!$municipality) {
            return ['status' => 'error', 'error' => 'La commune spécifiée n\'existe pas.'];
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if($user->save()){

            return ['status'=>'success', 'message' => "user created", 'user' => $user];
        }
        else{

            return [ 'status'=> 'error', 'error'=>'Provide proper details'];

        }
    }
}
