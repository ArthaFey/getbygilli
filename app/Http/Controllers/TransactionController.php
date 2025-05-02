<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaksi(Request $request)
    {
        $search = $request->search;
         $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
    
        $transaksi = Payment::query()
                            ->where('status', 'success')
                            ->when($search, function($query, $search) {
                                return $query->where('name', 'like', '%' . $search . '%')
                                             ->orWhere('tiket', 'like', '%' . $search . '%');
                            })
                            ->orderByDesc('created_at')
                            ->paginate(20);
    
        return view('backend.transaksi.index', compact('transaksi', 'unread'));
    }
    
    public function transaksiShow($id){
        $transaksi = Payment::findOrFail($id);
        $unread = Payment::where('is_read', false)->count();
        return view('backend.transaksi.show',compact('transaksi','unread'));
    }

    public function markAsRead($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->is_read = true;
        $payment->save();
        return redirect()->back();
    }
}
