<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\AccountStoreAvatar;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;

class AvatarController extends Controller
{
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    
    public function store(AccountStoreAvatar $request)
    {
        $processedImage = $this->imageManager->make($request->file('image')->getPathName())
        ->fit(100, 100, function ($c) {
            $c->aspectRatio();
        })
        ->encode('png')
        ->save(config('image.path.absolute') . $path = '/' . uniqid(true) . '.png');

        $image = Image::create([
            'path' => $path
        ]);

        return response([
            'data' => [
                'id' => $image->id,
                'path' => $image->path()
            ]
        ], 200);
    }
}
