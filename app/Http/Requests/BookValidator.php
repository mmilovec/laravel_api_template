<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //When LOGIN and AUTHORIZATION are implemented we need to check if user is authorized, for now are all users authorized
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
            'bookTitle' => 'required|alpha_num',
            'ISBN' => 'required|alpha_num',
            'publisher' => 'required|alpha_num',
            'numberOfPages' => 'numeric',
            'authorID' => 'required|numeric',
            'shelveID' => 'required|numeric',
        ];
    }
}
