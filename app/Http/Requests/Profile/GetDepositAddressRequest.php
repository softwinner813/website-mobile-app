<?php

namespace App\Http\Requests\Profile;

use App\Exceptions\RequestException;
use Defuse\Crypto\Crypto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Marketplace\Payment\BitcoinPayment;
use App\Deposit;

class GetDepositAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coin' => 'required|string'
        ];
    }

    public function persist()
    {
        try {
            $coin = new BitcoinPayment();
            $newAddress = $coin->generateAddress();

            $deposit = new Deposit();
            $deposit->address = $newAddress;
            $deposit->coin = $this->coin;
            // $deposit->created_at = Date('Y-m-');
            $deposit->save();
            
            session() -> flash('success', 'Deposit address is generated successfully!');

        } catch (Exception $e) {
            throw new RequestException("Can't generate new address!");
        }
        
    }
}
