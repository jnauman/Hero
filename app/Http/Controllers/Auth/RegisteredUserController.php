<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'pronouns' => $request->pronouns,
			'password' => Hash::make($request->password),
			'email_verified_at' => NOW(),
		]);

		event(new Registered($user));

		Auth::login($user);

		activity()
			->causedBy(auth()->user()) // Optional: associate the activity with a user
			->performedOn($user) // Optional: associate the activity with an Eloquent model
			->log('User registered');

		return redirect(route('quests.index', absolute: false));
	}

	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('auth.register');
	}
}
