<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Promotion;
use App\Models\SendPromotion;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromotionMail;
use Illuminate\Http\Request;

class SendPromotionController extends Controller
{
    public function sendPromotion($customerId, $promotionId)
    {
        // Cari data customer dan promotion berdasarkan ID
        $customer = Customer::findOrFail($customerId);
        $promotion = Promotion::findOrFail($promotionId);

        // Kirim email ke customer terkait menggunakan PromotionMail
        Mail::to($customer->email)->send(new PromotionMail($promotion));

        // Simpan data pengiriman promosi ke tabel send_promotions
        SendPromotion::create([
            'customer_id' => $customer->id,
            'promotion_id' => $promotion->id,
        ]);

        // Kembalikan respons berhasil
        return back()->with('success', 'Promotion sent successfully.');
    }
}
