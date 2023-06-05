<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\MeilSend;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'second_name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'second_name' => $request->second,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        event(new Registered($user));

         Mail::send('Html.view', $user, function ($message) use ($user)  {
             $message->from(config('mail.from.address'), 'John Doe');
             $message->to($user->email);
             // $message->bcc('john@johndoe.com', 'John Doe');
             $message->subject('Subject');
         });

        //$emailData['text'] = 'test data';
        //Mail::to(config('mail.from.address'))->send(new MeilSend('emails.test', $emailData));

        // Auth::login($user);

        return redirect('/finish');
    }
}
