<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }
  
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^5[0-9]{9}$/', 'unique:drivers,phone'],
            'vehicle_type' => 'required|string|max:50',
            'status' => 'required|in:active,inactive',
        ];
    }
    
    public function messages(): array
    {
        return [
            'full_name.required' => 'Ad Soyad alanı zorunludur.',
            'phone.required' => 'Telefon numarası zorunludur.',
            'phone.unique' => 'Bu telefon numarası zaten sistemde kayıtlı.',
            'phone.regex' => 'Telefon numarası 5 ile başlamalı ve 10 haneli olmalıdır (Örn: 5551234567).',
            'vehicle_type.required' => 'Araç tipi seçilmelidir.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.in' => 'Geçersiz durum değeri.',
        ];
    }
}