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
        $pendingOrders = DailyOrder::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $paidOrders = DailyOrder::where('status', 'paid')->where('user_id', Auth::user()->id)->count();
        return view('user.index', compact('Cashinhand', 'pendingOrders', 'paidOrders'));
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
        return redirect()->route('allorders')->with('status', 'Data Update Successfully');
        
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


       public function paidinsert(Request $request)
       {
           $userId = Auth::user()->id;
           $paid = new PaidOrder();
           if($request->hasFile('image'))
           {
               $file =$request->file('image');
               $ext = $file->getClientOriginalExtension();
               $filename = time(). '.' . $ext;
               $file->move('images/',$filename);
               $paid->image = $filename;
           }
   
           $paid->date = $request->input('date');
           // $paid->p_date = $request->input('p_date');
           $paid->order_id = $request->input('order_id');
           $paid->amount = $request->input('amount');
           $paid->user_id = $userId;
           $paid->save();
   
           $order_id = $request->input('order_id');
           if ($order_id ) {
               $order = DailyOrder::find($order_id);
               $order->status = 'paid';
               $order->save();
   
               $cash_in_hand = new CashInHand();
               $cash_in_hand->debit = $request->input('amount');
               $description = 'This Amount paid to ' . $order->receiver . '('.$order->cnic.')';
               $cash_in_hand->description= $description;
               $cash_in_hand->user_id = $userId;
               $cash_in_hand->save();
           }
   
           
           
            
           return redirect()->back()->with('status', 'Data Inserted');
       } 

    

       public function view_image($id)
       {
            $paid = PaidOrder::find($id);
            return view('user.editimage', compact('paid'));
       }

}
