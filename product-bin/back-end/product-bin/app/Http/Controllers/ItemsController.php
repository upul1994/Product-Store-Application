<?php

namespace App\Http\Controllers;


use App\Items;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function addProduct(Request $request){

        $table = new Items();


        // image
        $expl =explode(",",$request->image);
        $decode =base64_decode($expl[1]);

        if(str_contains($expl[0],'png')){
            $extention ='png';

        }else{
            $extention ='jpg';
        }

        $curruntTime = Carbon::now()->timestamp;

        $filename =$curruntTime.'.'.$extention;

        $filepath =public_path().'/'.$filename;

        file_put_contents($filepath,$decode);






        $table->name =$request->input("name");
        $table->quantity =$request->input("quantity");
        $table->price =$request->input("price");
        $table->image =$filename;

        $table->save();
        return response()->json(["message"=>"data saved"]);


    }


    public function getProduct(){
        $getAllProducts =Items::all();

        return response()->json(["allProducts"=>$getAllProducts]);
    }




    public function deleteProduct($id){

         $product =Items::find($id);

         if (!$product){
             return response()->json(["msg"=>"Id is not found"],404);
         }
         $product->delete();
        return response()->json(["msg"=>"deleted successfully"],200);
    }

   public function editProduct(Request $request ,$id){
        $product =Items::find($id);

        if (!$product){
            return response()->json(["msg"=>"Id is not found"],404);
        }


       $product->name =$request->input("name");
       $product->quantity =$request->input("quantity");
       $product->price =$request->input("price");

       $product->save();

       return response()->json(["msg"=>"product edited successfully"],200);

   }


 public function getProductById($id){
        $product =Items::find($id);

        if(!$product){
            return response()->json(["msg"=>"id is not found"],404);
        }
     return response()->json(["msg"=>$product],200);
 }





}
