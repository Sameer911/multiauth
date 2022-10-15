<?php

namespace App\Http\Controllers\Admin;

use App\CashInHand;
use App\Credit;
use App\DailyOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaidOrder;
use \Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function index()
    {
        $credit = Credit::all();
        $Cashinhand = cashInHandAmount();
        return view('admin.index' , compact('credit','Cashinhand'));
    }


    public function allorders()
    {
        $daily_orders = DailyOrder::all();
        $paidorders = PaidOrder::all();
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
        $paid_orders = PaidOrder::all();
        return view('admin.paidorder', compact('paid_orders'));
    }

    public function insertpaid(Request $request)
    {
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
        $paid->p_date = $request->input('p_date');
        $paid->order_id = $request->input('order_id');
        $paid->amount = $request->input('amount');
        $paid->save();

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

        $paid = new PaidOrder();
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

      

}
