<?php

namespace App\Http\Controllers;

use App\Models\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function imageAddController(Request $request)
    {

        // way one 
        $data= new ImageStorage();
        if($request->file('image')){
            $file= $request->file('image');
         // $filename= date('YmdHi').$file->getClientOriginalName();
            $filename =$file->getClientOriginalName();
            $file-> move(public_path('newImage'), $filename);
            $data['image']= $filename;
        }
        // return $data;
        $data->save();


        // way two 
    //     $data= new ImageStorage();
    //     if($request->hasFile('image')){
    //       $file = $request->file('image');
    //       $filename = $file->getClientOriginalName();
    //       $file->storeAs('public/',$filename);
    //       $data['image']= $filename;
    // }
    //     $data->save();


        // way three 
        // $portfolios = new ImageStorage;
        // $portfolios->image = $request->image;
        // $small_file = $request->file('image');
        // Storage::putFile('public/img/', $small_file);
        // $portfolios->image = "storage/img/".$small_file->hashName();
        // $portfolios->save();


    }




 }