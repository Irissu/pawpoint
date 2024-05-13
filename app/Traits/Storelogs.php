<?php

namespace App\Traits;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

trait Storelogs
{
    public function storeLog(Request $request, $typeOfLog)
    {
        /*    IGNORAR: 
                if (Auth::check()) {
                $user = Auth::user();
                Log::info('User activity logged:', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'route' => $request->path(),
                    'method' => $request->method()
                ]);
            } */
        switch ($typeOfLog) {
            case 'info':
                Log::info('Info: ', [
                    'route' => $request->path()
                ]);
                break;
            case 'failedLogin':
                Log::notice('User failed logging.', [
                    'route' => $request->path()
                ]);
                break;
            case 'createdUser':
                Log::info('Created new user/pet.', [
                    'route' => $request->path()
                ]);
                break;
            case 'editedStuff':
                Log::alert('Something has been edited.', [
                    'route' => $request->path()
                ]);
                break;
            case 'editedStuff':
                Log::warning('Something has been deleted.', [
                    'route' => $request->path()
                ]);
                break;
            default:
                Log::info('Mensaje de información generico:', [
                    'route' => $request->path()
                ]);
        }
    }

    public function storeLogLogged(Request $request, $typeOfLog) {
            if (Auth::check()) {

                switch( $typeOfLog) {
                    case 'errorCredentials':
                        
                }
            }
    }
}
