<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;


class AuthenticateController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
    public function index()
    {
        // Retrieve all the users in the database and return them
        $users = User::all();
        return $users;
    }
}

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxIiwiaXNzIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2FwaVwvYXV0aGVudGljYXRlIiwiaWF0IjoiMTQ0NDE4OTkwMiIsImV4cCI6IjE0NDQxOTM1MDIiLCJuYmYiOiIxNDQ0MTg5OTAyIiwianRpIjoiYWNlNWQxNWViODQwNTkwODljOGMwOTM2ZTJmYjg1YWMifQ.ATyOrB_y53E6VigoX5Yq0rTnzyShK0YhTUCQG4shkDI