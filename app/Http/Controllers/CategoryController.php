<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;   //model create must be use 

class CategoryController extends Controller
{
    //
             
    public function addcategory(){
        return view('admin.addcategory');
            }
           

                  //1- function to save data to put it in database 
                  // 2- make model in terminal -->$ php artisan make:model Category -m
                  //3- when make model ---->file in maigration to create table  ----> category.php
                 //------------save date from Form-----------

                  public function savecategory(Request $request){    //$request is variable recive data from form
                        //insert the data in category_name where... data come from input
                        $this->validate($request ,['category_name' => 'required']);
                        //========query to insert data=====
                       $cheackcat=Category::where('category_name',$request->input('category_name'))->first();
                       $category =new Category();

                          //validation and message
                          if(!$cheackcat){
                              //if category is not exist
                            $category->category_name=$request->input('category_name');
                            $category->save(); ///note *save*
                            return redirect('/addcategory')->with('status' , 'The '. $category->category_name . ' Category has been saved successfully');
                          }else{
                             //if category is exist
                            //with->('status') === session
                            return redirect('/addcategory')->with('status1' , 'The '. $request->input('category_name') . ' Category is already exist');
                          
                          }
                   // return view('admin.categories'); 
      }            
                  //------------show date from Form-----------
                public function categories(){
                //========query to select data=====
                
                    $Categories =Category::get();
                   
                //show in categories bage 
                    return view('admin.categories')->with('Categories' ,$Categories);
                                 
}

                // =========== to edite  =============

             public function edit($id){
                 $Category=Category::find($id); ///query find to get row with this id

                   return view('admin.editcategory')->with('Category',$Category);
               }
               
               // =========== to update  =============

    public function updatecategory(Request $request){
      $Category=Category::find($request->input('id')); //get the id from form put it in database
      $Category->category_name=$request->input('category_name');//put the top result in tableview
      $Category->update();
      return redirect('/categories')->with('status' , 'The '. $Category->category_name . ' Category has been updated successfully');
     // return view('admin.updatecategory');
          }
         

                // =========== to delete  =============
    public function delete($id){
      $Category=Category::find($id);
      $Category->delete();
      return redirect('/categories')->with('status' , 'The '. $Category->category_name . ' Category has been deledet successfully');

        }
         

}