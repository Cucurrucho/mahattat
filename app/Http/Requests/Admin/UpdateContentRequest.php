<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'about_us_en' => 'required|string',
            'about_us_ar' => 'required|string',
            'concepts_en' => 'required|string',
            'concepts_ar' => 'required|string',
            'groups_ar' => 'required|string',
            'groups_en' => 'required|string',

        ];
    }

    public function commit() {
        $content = app('content');
        $content->put('about_us_en', $this->input('about_us_en'));
        $content->put('about_us_ar', $this->input('about_us_ar'));
        $content->put('concepts_en', $this->input('concepts_en'));
        $content->put('concepts_ar', $this->input('concepts_ar'));
        $content->put('groups_ar', $this->input('groups_ar'));
        $content->put('groups_en', $this->input('groups_en'));

    }
}
