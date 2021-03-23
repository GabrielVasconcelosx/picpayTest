<?php namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller {


    public function store(Request $request, $payee, $payer)
    {
        if (!Users::find($payee)->exists() || !Users::find($payer)->exists()) {
            return 'NotFound';
        }

    }
}