<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Izinkan request ini dijalankan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi form.
     */
   public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'photo' => ['nullable', 'image', 'max:2048'],
    ];
}

}