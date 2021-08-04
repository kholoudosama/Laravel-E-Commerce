<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Storage;
use App\product;
use App\Category;


class ProductController extends Controller
{
    //-------> add product <------------
              
    public function addproduct(){
        //noooooote  between two tables
        $categories=Category::All()->pluck('category_name','category_name');   // select category_name from categories T
        return view('admin.addproduct')->with('categories',$categories);
            }

                   //-------> save product in database <------------
    public function saveproduct(Request $request ){
       //print($request->product_name);
        // ------> validation -------
        $this->validate($request ,
        [
        'product_name' => 'required' ,
        'product_price' => 'required',
        // 'product_image' => 'image|nullable|max:1999'
        'product_image' => 'required'


    ]);
    if($request->input('product_category')){

    // //if user selected image -------> uploade file <------------
    if($request->hasFile('product_image')){
             // 1 ====== git file from req =======     File['name']   
             $fileNameWithExt=$request->file('product_image')->getClientOriginalName();
             // 2 ====== git file name from path =======
             $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
             // 3 ====== gitfile Extention =======    File['extention'] 
             $extention=$request->file('product_image')->getClientOriginalExtension();
             // 4 ====== store file ======= 
             $fileNameToStore=$fileName.'_'.time().'.' . $extention;
             // 4 ====== uplode file=======      store at -->storage - app -puplic
             $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
     }else{
        $fileNameToStore='noimage.jpg';
    }

     // -------------- store in database -----------
    $product=new product();
    $product->product_name=$request->input('product_name');   
    $product->product_price=$request->input('product_price');
    $product->product_category=$request->input('product_category');
    $product->product_image=$fileNameToStore;
    $product->product_status=1;

     $product->save();

    // // if($request->input('product_status')){
    // //     $product->status=1;
    // // }else{
    // //     $product->status=0;

    // // }
    // //----------- end of store --------
     return redirect('/addproduct')->with('status' , 'The Product has been saved successfully');
    
            }else{
                return redirect('/addproduct')->with('status1' , 'Select Category !');


            }
        
    }
              //-------> show products <------------
              public function products(){
                  $Products=product::get();
                return view('admin.products')->with('Products',$Products);
                    }
                    
                     //-------> edite products <------------
              public function editeproduct($id){
                $Products=product::find($id);
                $categories=Category::All()->pluck('category_name','category_name'); //show 2 tables from db
              return view('admin.editeproduct')->with('Products',$Products)->with('categories',$categories);
                  }


                     //-------> update products <------------
                  public function updateproduct(Request $request){
                    $product=product::find($request->input('id')); //get the id from form put it in database

                //     $this->validate($request ,
                //     [
                //     'product_name' => 'required' ,
                //     'product_price' => 'required',
                //     'product_image' => 'required'
                // ]);

                    $product->product_name=$request->input('product_name');   
                    $product->product_price=$request->input('product_price');
                    $product->product_category=$request->input('product_category');

                    if($request->hasFile('product_image')){
                        // 1 ====== git file from req =======     File['name']   
                        $fileNameWithExt=$request->file('product_image')->getClientOriginalName();
                        // 2 ====== git file name from path =======
                        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                        // 3 ====== gitfile Extention =======    File['extention'] 
                        $extention=$request->file('product_image')->getClientOriginalExtension();
                        // 4 ====== store file ======= 
                        $fileNameToStore=$fileName .'_'.time().'.' . $extention;
                        // 4 ====== uplode file=======      store at -->storage - app -puplic
                        $path=$request->file('product_image')->storeAs('public/product_images' , $fileNameToStore);
                         }
                        if( $product->product_image !='noimage.jpg'){
                            Storage::delete('public/product_images/' . $product->product_image);  //delete from folder storge this pic
                        }
                        $product->product_image=$fileNameToStore;
                  
                        $product->update();
                    return redirect('/products')->with('status' , 'The '. $product->product_name . ' Product has been updated successfully');
                   // return view('admin.updatecategory');
                        }
                       
                                             //-------> delete products <------------

                 public function delete_product($id){
                      $product=product::find($id);  
                      $product->delete();  
                      return redirect('/products')->with('status' , 'The Product has been deledet successfully');

                          }
                          public function unactivate_product($id){
                            $product=product::find($id); 
                             $product->product_status=0; //--------> convert from active to unconvert
                             $product->update();
                             return redirect('/products')->with('status' , 'The Status has been Updated to Activated successfully');

                          }
                          public function activate_product($id){
                            $product=product::find($id); 
                             $product->product_status=1;    //--------> unconvert from active to active
                             $product->update();
                             return redirect('/products')->with('status' , 'The Status has been Updated to Unactivated successfully');

                          }
                          
                    }


