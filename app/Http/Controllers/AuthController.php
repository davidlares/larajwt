<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  // constructor
  public function __construct() {
     $this->middleware('jwt', ['except' => ['login']]);
  }

  // get a JWT via credentials
  public function login() {
    $credentials = request(['email', 'password']);
    if (!$token = auth()->claims(['custom' => "YHLQSMDLG"])->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
    return $this->respondWithToken($token);
  }

  // get Auth user
  public function me() {
    return response()->json(auth()->user());
  }

  // logging out
  public function logout() {
    auth()->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }

  // token refresh
  public function refresh() {
    return $this->respondWithToken(auth()->refresh());
  }

  // get torrent array structure
  protected function respondWithToken($token) {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 60
    ]);
  }

  // getting the payload
  public function payload() {
    return auth()->payload();
  }
}
