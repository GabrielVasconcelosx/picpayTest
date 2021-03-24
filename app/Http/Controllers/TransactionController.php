<?php namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller {


    public function store(Request $request)
    {
        $payee = Users::findOrFail($request->payee);
        $payer = Users::findOrFail($request->payer);
        $value = $request->value;
        
        $payer->balance = $payer->balance + $value;
        $payee->balance = $payee->balance -  $value;
        
        if($payer->value < 0) {
            return response()->json('insufficient balance');
        }

        Transaction::create([
            'id_user_payer' => $payer->id,
            'id_user_payee' => $payee->id,
            'value' => $request->value
        ]);

        $payer->save();
        $payee->save();
        return $this->respond(Response::HTTP_OK, $user);
    }

    public function addCash(Request $request, $id)
    {
        $user = Users::find($id);

        if(is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        
        if($request->value < 0){
            return $this->respond(Response::HTTP_NO_CONTENT, 'impossible to make transfer');
        }
        
        $user->update(['balance' => $user->balance + $request->value]);
        return $this->respond(Response::HTTP_OK, $user);
      
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }
}