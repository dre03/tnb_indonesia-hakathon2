<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){

        $payments = Payment::latest()->paginate();
        return view('pages.payment.index', [
            'title' => 'Payment',
            'payments' => $payments
        ]);
    }
}
