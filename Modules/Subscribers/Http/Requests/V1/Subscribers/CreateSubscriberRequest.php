<?php

namespace App\Http\Requests\V1\Subscribers;

use Illuminate\Foundation\Http\FormRequest;;

class CreateSubscriberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}