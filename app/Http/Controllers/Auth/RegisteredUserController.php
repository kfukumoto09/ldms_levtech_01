<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCategory;  // added to show user_categories at the login session
use App\Providers\RouteServiceProvider;
use Gate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        Gate::authorize('isAdministrator');
        if (\Auth::user()->can('create')) {
            $user_categories = UserCategory::all();  // added to show user_categories at the login session
            $user = new User;
            return view('auth.register')
                        ->with(['user_categories' => $user_categories,
                                'managers' => $user->get_managers()]);
        } else {
            return redirect('');  // Geteで十分なのでif分岐はいらないかも
        };
        
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
        Gate::authorize('isAdministrator');
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_category_id' => $request->user_category_id,
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
