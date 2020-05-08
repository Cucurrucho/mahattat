<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Storage;
use Image;
class StorePostRequest extends FormRequest {
    protected $post;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'body' => 'required|string',
            'title' => 'required|string',
            'summary' => 'required|string',
            'thumbnail' => 'mimes:jpeg,bmp,png,gif,svg,pdf'
        ];
    }

    public function commit() {
        $this->post = $this->route('post');
        $this->post->body = $this->input('body');
        $this->post->title = $this->input('title');
        $this->post->summary = $this->input('summary');
        if ($this->file('thumbnail')){
            Storage::delete("public/{$this->post->thumbnail}");
            $this->post->thumbnail =  $this->processPhoto();

        }
        $this->post->save();
        return $this->post;
    }
    protected function processPhoto() {
        $photo = $this->file('thumbnail');
        $image = Image::make($photo);
        $width = $image->width();
        $height = $image->height();
        if ($height > 300 || $width > 300) {
            $proportion = $height / $width;
            if ($proportion != 1) {
                $image->resize(300 , 300);
            } else {
                $image->resize(300,300);
            }
        }
        $mime = $image->mime();
        $mime = str_replace('image/', '.', $mime);
        $hash = $photo->hashName();
        if ($mime != '.jpeg' || $mime != '.jpeg') {
            $hash = str_replace($mime, '.jpeg', $photo->hashName());
        }
        $path = 'public/photos/' . $hash;
        Storage::put($path, (string)$image->encode('jpeg'));
        $path = 'photos/' . $hash;
        return $path;
    }
}

