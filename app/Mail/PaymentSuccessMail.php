<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    /**
     * Create a new message instance.
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembayaran Tiket Anda Berhasil!!!',
        );
    }

    /**
     * Get the message content definition.
     */public function build()
{
    // Mengambil data pembayaran berdasarkan order_id
    $payment = Payment::where('order_id', $this->payment->order_id)->first();
    
                return $this->view('backend.tiket.index') // View email template
                ->from('boatgiliwanders@gmail.com', 'Gili Wanders')
                ->with([
                    'name' => $payment->name,
                    'order_id' => $payment->order_id,
                    'tiket' => $payment->tiket,
                    'from' => $payment->from,
                    'to' => $payment->to,
                    'operator' => $payment->operator,
                    'class' => $payment->class,
                    'hotline' => $payment->hotline,
                    'gmaps' => $payment->gmaps,
                    'total_harga' => $payment->total_harga,
                    'jumlah_tiket_dewasa' => $payment->jumlah_tiket_dewasa,
                    'jumlah_tiket_anak_anak' => $payment->jumlah_tiket_anak_anak,
                    'tanggal_keberangkatan' => $payment->tanggal_keberangkatan,
                    'tanggal_tiba' => $payment->tanggal_tiba,
                ])
                ->subject('Pembayaran Tiket Anda Berhasil!');
}


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
