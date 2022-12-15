<?php

namespace App\Http\Controllers;

use App\Models\MultipleImage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function StoreImg(Request $request){
        if($files = $request->file('image')) {
            // $title = $request->title;
            foreach ($files as $file) {
            // $path = $file->storeAs('featured-photos', md5(rand(1000, 10000)). '.' . $file->getClientOriginalExtension());
            $path= $file->getClientOriginalName();
            $file->move('featured-photos', $path);
            MultipleImage::create([
                             'image' => $path,
                         ]);
         
        }
    } 
 }

}
