<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'video_url' => 'nullable|file|mimetypes:video/mp4',
            'video_duration' => 'nullable'
        ];
    }
}
