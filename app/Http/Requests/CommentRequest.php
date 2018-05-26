<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->isMethod('POST')){
            return [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'comment' => 'required|min:10'
            ];
        } else return [];

    }

    public function messages()
    {
        return parent::messages();
    }
}
