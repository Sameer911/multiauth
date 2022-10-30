<?php

namespace App\Http\Controllers;

use App\CashInHand;
use App\DailyOrder;
use App\PaidOrder;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Cashinhand = cashInHandAmountByUser(Auth::user()->id);
        $pendingOrders = DailyOrder::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $paidOrders = DailyOrder::where('status', 'paid')->where('user_id', Auth::user()->id)->count();
        return view('home', compact('Cashinhand','pendingOrders', 'paidOrders'));
    }

        
   public function adminhome()
   {
        $Cashinhand = cashInHandAmount();
        $pendingOrders = DailyOrder::all()->count();
        $paidOrders = PaidOrder::where('status', '=', 'paid')->count();
        $users = User::all();
        return view('admin.index' ,compact('Cashinhand', 'pendingOrders', 'paidOrders','users'));
   }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
