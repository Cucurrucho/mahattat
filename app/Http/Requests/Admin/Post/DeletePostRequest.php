<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class DeletePostRequest extends FormRequest
{
    protected  $post;
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
            //
        ];
    }

    public function commit() {
        $this->post = $this->route('post');
        Storage::delete("public/{$this->post->thumbnail}");
        $this->post->delete();
    }
}
