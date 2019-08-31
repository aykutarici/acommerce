<?php

namespace App\Http\Controllers;

use Stripe\Card;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionsController extends Controller
{
	public function index()
	{
		return view('subscriptions.index');
	}

	public function create(Request $request)
	{
		//validate request
		try {
			$operation=Auth::user()->newSubscription('grape shop', 'grape-shop')->create($request->stripe_token);
			//save other inputs to db
			//do some other stuffs
			return redirect()->route('subscription.success');
		} catch (Card $e) {
			dd($e);

			$err = $e->getJsonBody()['error'];
			Session::flash('cardError', $err['message']);
			return back();
		} catch (\Stripe\Error\InvalidRequest $e) {
			dd($e);

			$err = $e->getJsonBody()['error'];
			Session::flash('invalidRequest', $err['message']);
			return back();
		} catch (\Stripe\Error\ApiConnection $e) {
			dd($e);

			$err = $e->getJsonBody()['error'];
			Session::flash('apiConnectionError', $err['message']);
			return back();
		} catch (\Stripe\Error\Base $e) {
			dd($e);

			Session::flash('generalError', 'There was an error processing your payment.');
			return back();
		}

	}

	public function success()
	{
		return view('subscriptions.success');
	}

}
