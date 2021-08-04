
@extends('layouts.appadmin')
@section('title')
Edit Category
@endsection

@section('content')         

                    <div class="row grid-margin">
                    <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                             <h4 class="card-title">Edite Category</h4>

                             {!!Form::open(['action' => 'CategoryController@updatecategory' ,'class' => 'cmxform' ,'method' => 'POST','id' => 'commentForm' ])!!}
                             {{csrf_field()}}
                           <div class="form-group">
                             {{Form::hidden( 'id' ,$Category->id)}}
                             {{Form::label( '' ,'Create Category',['for' => 'cname'] )}}
                             {{Form::text( 'category_name' ,$Category->category_name,['class' => 'form-control' ,'minlength' => '2' ])}}


                         </div>
                              {{Form::submit( 'Update' ,['class' => 'btn btn-primary'] )}}

                               {!!Form::close()!!}
                                   
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@section('scripts')
/<script src="{{asset('frontend/js/bt-maxlength.js')}}"></script>

@endsection


