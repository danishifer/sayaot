<?php


namespace App\Actions;


use App\Models\User;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Laravel\Firebase\Facades\Firebase;

class AuthenticateLoginAttempt
{

    public function __invoke(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        try {
            $verifiedIdToken = Firebase::auth()->verifyIdToken($request->password);
        } catch (InvalidToken $e) {
//            echo 'The token is invalid: '.$e->getMessage();
            return null;
        } catch (\InvalidArgumentException $e) {
//            echo 'The token could not be parsed: '.$e->getMessage();
            return null;
        }

        $phoneNumber = $verifiedIdToken->claims()->get('phone_number');
        if ($user && $phoneNumber && $request->phone === $phoneNumber) {
            return $user;
        }

        return null;
    }
}
