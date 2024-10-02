<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateUserAction;
use App\Actions\UpdateCustomerAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
// use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerApiResource;
use App\Http\Resources\Shopper\ShopperResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserApiResource;
use Laravel\Sanctum\PersonalAccessToken;

class AuthApiController extends Controller
{
    public function register(UserRequest $request)
    {
        $requestData = $request->validated();

        try {
            $response = app(CreateUserAction::class)->execute($requestData);
            if (isset($response['status']) && $response['status'] === 'success') {
                $user = $response['user']->load('municipality');
                return response()->json(['message' => 'User created successfully',"status"=>"ok", 'user' => new UserApiResource($user)], 201);
            }else{
                return response()->json(['message' => 'User not created'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }


    public function login(Request $request)
    {
        $request->validate([
          'email' => 'required|string|email',
          'password' => 'required|string',
          'remember_me' => 'boolean'
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'message' => 'credential-error'
            ],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'token' => $token,
            'status' => "success",
            'message' => "Success, you're logged with success.",
            'user' => new CustomerApiResource($user)
        ]);
    }
    public function user(Request $request)
    {
        $user = $request->user();
        if ($user->role == "shopper") {
            return response()->json(new ShopperResource( $request->user()));
        }else{
            return response()->json(new CustomerApiResource( $request->user()));
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);

    }

    public function refresh(Request $request)
    {
        $user = $request->user();
        if ($user->role == "shopper") {
            return response()->json([
                'user' =>new ShopperResource($request->user()),
                'authorization' => [
                    'token' => $request->user()->createToken('Personal Access Token')->plainTextToken,
                    'type' => 'bearer',
                ],
            ]);
        }else{
            return response()->json([
                'user' =>new CustomerApiResource( $request->user()),
                'authorization' => [
                    'token' => $request->user()->createToken('Personal Access Token')->plainTextToken,
                    'type' => 'bearer',
                ],
            ]);
        }

    }

    public function confirm($token,$email)
    {

        $isValidToken = PersonalAccessToken::findToken($token);
        $baseUrl = config('services.loginBaseUrl.url');

        if ($isValidToken) {


        User::where('email', $email)
            ->update(['email_verified_at' => now()]);

        return redirect()->away(`$baseUrl/login?status=success&token=`.$token);

        } else {

            return redirect()->away(`$baseUrl/login?status=error`);

        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Mot de passe actuel incorrect'], 400);
        }
        $use = User::find($user->id);

        $use->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json(['message' => 'Mot de passe changé avec succès']);
    }
    public function updateProfile(UpdateCustomerRequest $request)
    {
        $requestData = $request->validated();
        $user = auth()->user();
        $cust = Customer::find($user->id);

        // $user->update($requestData);
        $response = app(UpdateCustomerAction::class)->execute($requestData,$cust);

        return response()->json(['message' => 'Profil utilisateur mis à jour avec succès', 'data' => $response]);
    }


}
