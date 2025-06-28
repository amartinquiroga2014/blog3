<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             'title' => 'required|min:3',
             'excerpt' => 'required|min:10',
             'content' => 'required|min:15',

        ];
    }
}
