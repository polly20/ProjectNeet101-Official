<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ApiController extends Controller
{
    //
    public function validate_authorization(Request $request) {
    $basic_auth = $request->header('Authorization');
    $validate = explode(' ', $basic_auth);

    $accounts = null;
    if(COUNT($validate) > 1) {
        $decoded = base64_decode($validate[1]);
        $accounts = explode(':', $decoded);
        $email = $accounts[0];
        $password = $accounts[1];

        $user = User::where("email", $email)->first();

        if(COUNT($company) == 0) {
          return array(
            "status" => 404,
            "message" => "Account is not valid"
          );
        }

        return array(
          "status" => 200,
          "message" => $company[0]
        );
    }

    return array(
      "status" => 500,
      "message" => "Account did not found"
    );
  }

    public function init(Request $request) {
      $validate = $this->validate_authorization($request);
      if($validate["status"] != 200) {
        return $validate;
      }

    }
}
