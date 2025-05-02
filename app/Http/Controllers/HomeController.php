<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessMail;
use App\Models\Berita;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Testimoni;
use App\Models\Tiket;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Midtrans\Notification;


class HomeController extends Controller
{
    public function home(){
        $category = Category::orderByDesc('created_at')->get();
        $tiket =  Tiket::orderByDesc('created_at')->where('status',1)->paginate(12);
        $berita =  Berita::orderByDesc('created_at')->paginate(3);
        $review =  Testimoni::orderByDesc('created_at')->get();
        return view('frontend.index',compact('category','tiket','berita','review'));
    }

    public function category_all($slug){
        $category = Category::where('slug',$slug)->first();
        $tiket = $category->tiket()->with(['fototransportasi','deskripsitiket'])->orderByDesc('created_at')->where('status',1)->paginate(20);
        $news = Berita::orderByDesc('created_at')->paginate(4);
        return view('frontend.category-tiket-all.book-info',compact('category','tiket','news'));
    }
    
    public function all_tiket(){
        $tiket = Tiket::orderByDesc('created_at')->where('status',1)->paginate(20);
        $news = Berita::orderByDesc('created_at')->paginate(4);
        return view('frontend.tiket.all-tiket',compact('tiket','news'));
    }

    public function detail_berita($id){
        $berita = Berita::findOrFail($id);
        $news = Berita::orderByDesc('created_at')->paginate(5);
        return view('frontend.berita.blog',compact('berita','news'));
    }

    public function search_tiket(Request $request){
        $departure = $request->input('departure');       // Contoh: "Jakarta"
        $destination = $request->input('destination');   // Contoh: "Surabaya"
        $date = $request->input('date');                 // Contoh: "2025-04-15"
        $passenger = $request->input('passenger');       // Misalnya: "2"
    
        // Gabungkan untuk cocokan dengan judul_tiket
        $route = $departure . ' - ' . $destination;
    
        // Query database: cari tiket berdasarkan rute dan tanggal
        $tiket = Tiket::where('judul_tiket', 'like', "%$route%")
                    ->whereDate('tanggal_keberangkatan', $date)
                    ->paginate(10);
        $news = Berita::orderByDesc('created_at')->paginate(4);

        return view('frontend.tiket.all-tiket',compact('departure', 'destination', 'date', 'passenger', 'tiket','news'));
    }

    public function booking_tiket($slug){
          // Membuat instance Guzzle Client
          try {
            // Menggunakan Laravel HTTP Client
            $response = Http::get('https://countriesnow.space/api/v0.1/countries');
    
            if ($response->successful()) {
                $countriesData = $response->json();
                $countries = $countriesData['data'];
            } else {
                $countries = [];
            }
        } catch (\Exception $e) {
            $countries = [];
        }
        $tiket = Tiket::where('slug',$slug)->with(['fototransportasi','deskripsitiket'])->first();
        return view('frontend.tiket.booking',compact('tiket','countries'));
    }

    public function checkout_tiket(Request $request){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $orderId = rand();
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'name' => $request['tiket'],
                'gross_amount' => $request['total_harga'],
            ),
            'customer_details' => array(
                'first_name' => $request['name'],       // Name of the user
                'email' => $request['email'],           // User's email address
                'phone' => $request['no_telp'],           // User's phone number
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $payment = Payment::create([
            'order_id' => $orderId,
            'snap_token' => $snapToken,
            'tiket' => $request->tiket,
            'from' => $request->from,
            'to' => $request->to,
            'operator' => $request->operator,
            'class' => $request->class,
            'hotline' => $request->hotline,
            'gmaps' => $request->gmaps,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'tanggal_tiba' => $request->tanggal_tiba,
            'jumlah_tiket_dewasa' => $request->jumlah_tiket_dewasa,
            'jumlah_tiket_anak_anak' => $request->jumlah_tiket_anak_anak,
            'total_harga' => $request->total_harga,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'passport_no' => $request->passport_no,
            'passport_expiry' => $request->passport_expiry,
            'passport_issue' => $request->passport_issue,
            'nationality' => $request->nationality,
            'baggage' => $request->baggage,
        ]);

        return redirect()->route('payment.checkout',$payment->order_id);
    }

    public function payment_checkout($order_id){
    $payment = Payment::where('order_id', $order_id)->firstOrFail();
    return view('frontend.payment.checkout-payment', compact('payment'));
    }

    public function success($order_id){
        $payment = Payment::where('order_id', $order_id)->first();
        $payment->status = 'success';
        $payment->save();
        return redirect()->route('home')->with('success','Pembelian Tiket Berhasil'); 
    }

    public function handleMidtransNotification(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;

        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;

        Log::info('Midtrans Webhook Received', [
            'order_id' => $order_id,
            'transaction_status' => $transaction
        ]);

        $payment = Payment::where('order_id', $order_id)->first();

        if (!$payment) {
            Log::warning('Payment not found for order_id: ' . $order_id);
            return response()->json(['status' => 'order not found'], 404);
        }
        if (in_array($transaction, ['capture', 'settlement'])) {
            Mail::to($payment->email)->send(new PaymentSuccessMail($payment));
            $payment->status = 'success';
            $payment->save();

            Log::info('Ticket sent for order_id: ' . $order_id);
        }

        return response()->json(['status' => 'success']);
    }
    
    
}
