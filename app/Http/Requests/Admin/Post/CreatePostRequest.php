<?php

namespace App\Http\Requests\Admin\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Storage;
use Image;

class CreatePostRequest extends FormRequest {
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
            'thumbnail' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf'
        ];
    }

    public function commit() {
        $post = new Post;
        $post->body = $this->input('body');
        $post->title = $this->input('title');
        $post->summary = $this->input('summary');
        $post->thumbnail = $this->processPhoto();
        $post->save();
        return $post;
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
