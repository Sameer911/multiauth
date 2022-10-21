<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\CashInHand;
use App\Credit;
use App\User;
use App\DailyOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaidOrder;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        $credit = Credit::orderBy('created_at', 'desc')->get();
        $Cashinhand = cashInHandAmount();
        return view('admin.index' , compact('credit','Cashinhand'));
    }


    public function allorders()
    {
        $daily_orders = DailyOrder::orderBy('created_at', 'desc')->get();
        $paidorders = PaidOrder::orderBy('created_at', 'desc')->get();
        $Cashinhand = cashInHandAmount();
        return view('admin.allorder',compact('daily_orders', 'paidorders', 'Cashinhand'));
    }


    public function editpage($id)
    {
        $all_orders = DailyOrder::find($id);
        return view('admin.editallorder', compact('all_orders'));
    }


        public function deletepaid($id)
        {
            $paid_del = PaidOrder::find($id);
            $paid_del->delete();
            return redirect()->back()->with('status', 'Paid Order Deleted Successfully');
        }


    public function paid()
    {
        $paid_orders = PaidOrder::where('user_id',Auth::user()->id) ->orderBy('created_at', 'desc')->get();
        return view('admin.paidorder', compact('paid_orders'));
    }

    public function insertpaid(Request $request)
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


    public function editpaid($id)
    {
        $paid = PaidOrder::find($id);
        return view('admin.editpaid', compact('paid'));
    }

    public function paidupdate(Request $request, $id)
    {
        $paid = PaidOrder::find($id);

        if($request->hasFile('image'))
        {
            $des = 'images'.$paid->image;
            if(File::exists($des))
            {
                File::delete($des);
            }
            $file =$request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('images/',$filename);
            $paid->image = $filename;
        }

        $paid->date = $request->input('date');
        $paid->p_date = $request->input('p_date');
        $paid->receiver = $request->input('receiver');
        $paid->father_name = $request->input('father_name');
        $paid->sender = $request->input('sender');
        $paid->cnic = $request->input('cnic');
        $paid->amount = $request->input('amount');
        $paid->paid = $request->input('paid');
        $paid->balance = $request->input('balance');

        $paid->update();
        return redirect()->back()->with('status','Data Updated');
    }


       public function savetopiad($id)
       {
            $savetopaid = DailyOrder::find($id);
            return response()->json([
                'status'=>200,
                'savetopaid'=>$savetopaid,
            ]);
       }

       public function inserttopaid(Request $request, $id)
       {
            $newpaid = new PaidOrder();


            if($request->hasFile('image'))
            {
                $file =$request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time(). '.' . $ext;
                $file->move('images/',$filename);
                $newpaid->image = $filename;
            }

            $newpaid->date = $request->input('date');
            $newpaid->p_date = $request->input('p_date');
            $newpaid->receiver = $request->input('receiver');
            $newpaid->father_name = $request->input('father_name');
            $newpaid->sender = $request->input('sender');
            $newpaid->cnic = $request->input('cnic');
            $newpaid->amount = $request->input('amount');
            $newpaid->paid = $request->input('paid');
            $newpaid->balance = $request->input('balance');
            $newpaid->save();

            return view('admin.allorder');
       }

       public function adddailydata()
       {
        return view('admin.adddailydata');
       }

       public function login()
       {
        return redirect()->route('login');
       }


    //    For Uers

       public function create(Request $request)
       {
            $new_user = new User();

            $new_user->name  = $request->input('name');
            $new_user->email = $request->input('email');
            $new_user->email = $request->input('email');
            $new_user->password = $request->input('password');



            $new_user->save();
 

            return view('admin.adduser');
       }


       public function users()
       {
            $users = User::all();
            return view('admin.users', compact('users'));
       }

       public function edit_user($id)
       {
            $user = User::find($id);
            return view('admin.useredit' ,compact('user'));
       }

       public function update_user(Request $request, $id)
       {

            $user_update = User::find($id);

            $user_update->name = $request->input('name');

            $user_update->email = $request->input('email');

            $user_update->update();

            return redirect()->route('user');
       }

       public function delete_user($id)
       {
            $delet_user = User::find($id)->delete();
            Return redirect()->route('user');
       }

      public function trash()
      {
        $trash = User::onlyTrashed()->get();

        return view('admin.deleteduser', compact('trash'));
      }

    
      

}
