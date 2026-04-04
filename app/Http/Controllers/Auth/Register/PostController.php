<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\SendNewUserIntroductionJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $newUser = User::create([
            'name' => $request->name(),
            'email' => $request->email(),
            'password' => Hash::make($request->password()),
        ]);
        Auth::login($newUser);

        SendNewUserIntroductionJob::dispatch($newUser);

        return redirect()->route('tweet.index');
    }
}
