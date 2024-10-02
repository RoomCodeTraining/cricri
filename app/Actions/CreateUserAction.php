<?php

namespace App\Actions;

use App\Models\Municipality;
use App\Models\User;
use Carbon\Carbon;

class CreateUserAction
{
    public function execute(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        if (isset($data['municipality_uuid'])) {
            $municipality = Municipality::where('uuid', $data['municipality_uuid'])->first();
            if ($municipality) {
                $user->municipality()->associate($municipality);
            }
        }
        if ($user->save()) {
            return [
                'status' => 'success',
                'user' => $user
            ];
        } else {
            return [
                'status' => 'error',
                'error' => 'Provide proper details'
            ];
        }
    }
}
