<?php

namespace App\Http\Controllers\User;

use App\DailyOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\CashInHand;
use App\PaidOrder;
use Illuminate\Support\Facades\Auth;

class UserdataController extends Controller
{
    public function index()
    {
        $Cashinhand = cashInHandAmountByUser(Auth::user()->id);
        return view('user.index', compact('Cashinhand'));
    }


    public function daily()
    {
        $daily = DailyOrder::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.daily',compact('daily'));
    }



    public function dataadd(Request $request)
    {
        $daily_order = new DailyOrder(); 


        $daily_order->order = $request->input('order');
        $daily_order->date = $request->input('date');
        $daily_order->city = $request->input('city');
        $daily_order->sender = $request->input('sender');
        $daily_order->receiver = $request->input('receiver');
        $daily_order->father_name = $request->input('father_name');
        $daily_order->cnic = $request->input('cnic');
        $daily_order->amount = $request->input('amount');
        // $daily_order->status = $request->input('status');
        $daily_order->user_id = $request->input('user_id');
        $daily_order->entry_date = $request->input('entry_date');
 
            $daily_order->save();
            return redirect()->route('daily')->with('status', 'Data Added');
    }



        public function edit($id)
        {
            $all_orders = DailyOrder::find($id);
            return view('user.allordersedit', compact('all_orders'));
        }



    public function update(Request $request ,$id)
    {  

        $daily = DailyOrder::find($id);
        $daily->order = $request->input('order');
        $daily->date = $request->input('date');
        $daily->city = $request->input('city');
        $daily->sender = $request->input('sender');
        $daily->receiver = $request->input('receiver');
        $daily->father_name = $request->input('father_name');
        $daily->cnic = $request->input('cnic');
        $daily->amount = $request->input('amount');
        $daily->status = $request->input('status');
        $daily->user_id = $request->input('user_id');
        $daily->entry_date = $request->input('entry_date');

        $daily->update();
        return redirect()->back()->with('status', 'Data Update Successfully');
        
    }


    public function paidorderu()
    {
        $paid_orders = PaidOrder::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.paidorder', compact('paid_orders'));
    }

    public function save_to_paid($id)
       {
            $savetopaid = DailyOrder::find($id);
            return response()->json([
                'status'=>200,
                'savetopaid'=>$savetopaid,
            ]);
       }

       public function adddaily()
       {
            return view('user.adddaily');
       }

       public function datapaid()
       {
            return view('user.addpaid');
       }


}
