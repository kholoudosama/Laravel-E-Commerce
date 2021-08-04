
@extends('layouts.appadmin')
@section('title')
Add Product
@endsection

@section('content')         

                    <div class="row grid-margin">
                    <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                             <h3 class="card-title">Create Pruduct</h3>
                             @if(Session::has('status'))
                                  <div  class="alert alert-success">
                                       {{Session::get('status')}}
                                  </div>
                             @endif

                             @if(Session::has('status1'))
                             <div  class="alert alert-danger" >
                                       {{Session::get('status1')}}
                                  </div>
                             @endif
                             
                             {!!Form::open(['action' => 'ProductController@saveproduct' ,
                              'class' => 'cmxform' ,'method' => 'POST','id' => 'commentForm' ,'enctyped' => 'multipart/form-data'  ])!!}
                             {{csrf_field()}}
                           <div class="form-group">
                             {{Form::label( '' ,' Product Name',['for' => 'cname'] )}}
                             {{Form::text( 'product_name' ,'',['class' => 'form-control' ,'minlength' => '2' ])}}
                           </div>
                             <div class="form-group">
                             {{Form::label( '' ,'Product Price',['for' => 'cname'] )}}
                             {{Form::number( 'product_price' ,'',['class' => 'form-control' ])}}
                             </div>

                             <div class="form-group">
                             {{Form::label( '' ,'Product Category',['for' => 'cname'] )}}
                             {{Form::select( 'product_category' ,$categories,null ,
                              ['placeholder' => 'Select Category' , 'class' => 'form-control' ] 
                                   )}}
                             </div>
                             <div class="form-group">

                             {{Form::file( 'product_image' ,['class' => 'form-control' ])}}
                             </div>
                             <!-- <div class="form-group">

                             {{Form::label( '' ,'roduct Status',['for' => 'cname'] )}}

                             {{Form::checkbox( 'product_Status' ,'','true',['class' => 'form-control' ])}}
                             </div> -->
                             <div class="form-group">

                             {{Form::submit( 'Save' ,['class' => 'btn btn-primary'] )}}
                            </div>
                            </div>
                            

                               {!!Form::close()!!}
                                   
                                </div>
                            </div>
                        </div>
                   

@endsection

@section('scripts')
<!-- <script src="frontend/js/form-validation.js"></script> -->
<script src="{{asset('frontend/js/bt-maxlength.js')}}"></script>

@endsection
