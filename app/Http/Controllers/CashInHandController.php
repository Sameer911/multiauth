<?php

namespace App\Http\Controllers;
use App\CashInHand;
use App\User;

use Illuminate\Http\Request;

class CashInHandController extends Controller
{
    public function index()
    {
            $debit_all = CashInHand::orderBy('created_at', 'desc')->get();
            $Cashinhand = cashInHandAmount();
            return view('admin.cashinhand',compact('debit_all', 'Cashinhand'));
    }



    

    public function debitinsert(Request $request)
        {
            $debit = new CashInHand;

            $debit->debit = $request->input('debit');
            $debit->credit = $request->input('credit');
            $debit->description = $request->input('description');

            $debit->save();

            return redirect()->route('cash')->with('status', 'Data Inserted');
        }

        public function debitedit($id)
        {   
            $debit = CashInHand::find($id);
            return response([
                'status'=>200,
                'debit'=>$debit,
            ]); 
        }

        public function debitupdate(Request $request)
        {
            $debit_id = $request->input('deb_it');

            $debit = CashInHand::find($debit_id);
            $debit->debit = $request->input('debit');
            $debit->credit = $request->input('credit');
            $debit->description = $request->input('description');
            $debit->update();

            return redirect()->back()->with('status', 'Data updated'); 
        }

        public function debitdelete($id)
        {
            $debit_delete = CashInHand::find($id);
            $debit_delete->delete();
            return redirect()->back()->with('status', 'Data Deleted'); 
            
        }

        public function cashapage()
        {
            $users = User::all();
            return view('admin.addcashinhand', compact('users'));
        }
}
