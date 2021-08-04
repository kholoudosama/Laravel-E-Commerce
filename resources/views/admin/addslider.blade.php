
@extends('layouts.appadmin')
@section('title')
Add Slider
@endsection

@section('content')         

                    <div class="row grid-margin">
                    <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                             <h3 class="card-title">Create Slider</h3>
                             {!!Form::open(['action' => 'SliderController@saveslider' ,'class' => 'cmxform' ,'method' => 'POST','id' => 'commentForm' ])!!}
                             {{csrf_field()}}
                           <div class="form-group">
                             {{Form::label( '' ,' Dicreption one',['for' => 'cname'] )}}
                             {{Form::text( 'description_one' ,'',['class' => 'form-control' ,'minlength' => '2' ])}}
                           </div>
                           <div class="form-group">
                             {{Form::label( '' ,' Dicreption two',['for' => 'cname'] )}}
                             {{Form::text( 'description_two' ,'',['class' => 'form-control' ,'minlength' => '2' ])}}
                       <div class="form-group">
                             {{Form::label( '' ,'Slider Image',['for' => 'cname'] )}}

                             {{Form::file( 'slider_image' ,['class' => 'form-control' ])}}
                             </div>
                             
                             <div class="form-group">

                             {{Form::submit( 'Save' ,['class' => 'btn btn-primary'] )}}
                            </div>
                            </div>
                            
                            </div>
                               {!!Form::close()!!}
                                   
                                </div>
                           
                        </div>
                   

@endsection

@section('scripts')
<!-- <script src="frontend/js/form-validation.js"></script> -->
<script src="{{asset('frontend/js/bt-maxlength.js')}}"></script>

@endsection
