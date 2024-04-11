<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $payment_id = Request::instance()->payment_method_id;

        $payment = PaymentMethod::find($payment_id);

        if ($payment->rekening == 'cod' || request('delivery') == 'pickup') {
            return [
                'address' => ['nullable', 'string', 'max:255'],
                'province' => ['nullable', 'string', 'max:255'],
                'city' => ['nullable', 'string', 'max:255'],
                'kecamatan' => ['nullable', 'string', 'max:255'],
                'zip_code' => ['nullable', 'numeric', 'digits:5'],
                'other_detail' => ['nullable', 'string', 'max:255'],
                'delivery' => ['required'],

                'user_id' => 'required',
                'total_price' => 'required',
                'payment_method_id' => 'required',
                'payment_proof' => 'nullable|image',
            ];
        }

        return [
            'address' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'numeric', 'digits:5'],
            'other_detail' => ['nullable', 'string', 'max:255'],
            'delivery' => ['required'],

            'user_id' => 'required',
            'total_price' => 'required',
            'payment_method_id' => 'required',
            'payment_proof' => 'required|image',
        ];
    }
}
