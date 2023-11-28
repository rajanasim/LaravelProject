<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductInfo extends Controller
{
    
    public function index(Request $request)
    {
        // dd($request->inputCity) ;

        $product_name = $request->input('product_name'); 
        $product_description = $request->input('product_description'); 
        $product_price = $request->input('product_price'); 
        $product_color = $request->input('product_color'); 
        $product_discount = $request->input('product_discount'); 
        $product_sku = $request->input('product_sku'); 
        $product_category = $request->input('product_category'); 
        $product_availablity = $request->input('product_availablity'); 
        $product_image = $request->file('product_image'); 

        // $path = public_path('public/images');

        // if(!File::isDirectory($path)){
        //     File::makeDirectory($path, 0777, true, true); 
        //     // retry storing the file in newly created path.            
            
        // }   

        // $product_image =  time().'.'.$request->product_image->extension();  
        // $request->product_image->storeAs('public/images', $product_image); 
        
        $product_image_path = '';
        
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('images',$filename);
            $product_image_path = $filename;
        }  
 
        DB::table('product_info')->insert([
            'product_name' => $product_name, 
            'product_description' => $product_description, 
            'product_price' => $product_price, 
            'product_color' => $product_color, 
            'product_discount' => $product_discount, 
            'product_sku' => $product_sku, 
            'product_category' => $product_category, 
            'product_availablity' => $product_availablity, 
            'product_image' => $product_image_path, 
            // Add other fields if applicable
        ]);  
        // Add Without AJAX
        $product_info_arr = DB::table('product_info')->orderBy('id', 'desc')->get(); 
        return view("welcome", ['data' => $product_info_arr]); 
    }

    public function getProductinfo()
    {
       
        // Add Without AJAX
        $product_info_arr = DB::table('product_info')->orderBy('product_name', 'asc')->get(); 
        return view("welcome", ['data' => $product_info_arr]);
        


        // return redirect('/');
    }
    public function add_product_info_ajaxanyname(Request $request)
    {
       
        // dd($request->inputCity) ;

        $product_name = $request->input('product_name'); 
        $product_description = $request->input('product_description'); 
        $product_price = $request->input('product_price'); 
        $product_color = $request->input('product_color'); 
        $product_discount = $request->input('product_discount'); 
        $product_sku = $request->input('product_sku'); 
        $product_category = $request->input('product_category'); 
        $product_availablity = $request->input('product_availablity'); 
        $product_image = $request->file('product_image');  
        
        $product_image_path = ''; 
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('images',$filename);
            $product_image_path = $filename;
        }  
 
        DB::table('product_info')->insert([
            'product_name' => $product_name, 
            'product_description' => $product_description, 
            'product_price' => $product_price, 
            'product_color' => $product_color, 
            'product_discount' => $product_discount, 
            'product_sku' => $product_sku, 
            'product_category' => $product_category, 
            'product_availablity' => $product_availablity, 
            'product_image' => $product_image_path, 
            // Add other fields if applicable
        ]);  
        // Add Without AJAX
        $product_info_arr = DB::table('product_info')->orderBy('id', 'desc')->get(); 
        echo json_encode(array("message"=>"successfully submitted"));
        
    }
}