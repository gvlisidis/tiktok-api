<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function loggedInUser()
    {
        try {
            $user = User::query()->where('id', auth()->id())->first();
           // dd($user);

            return new UserResource($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
