
@extends('layouts.appadmin')
@section('title')
Add Category
@endsection

@section('content')         

                    <div class="row grid-margin">
                    <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                             <h3 class="card-title">Create Category</h3>

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

                             {!!Form::open(['action' => 'ProductController' ,'class' => 'cmxform' ,'method' => 'POST','id' => 'commentForm' ])!!}
                             {{csrf_field()}}
                           <div class="form-group">
                             {{Form::label( '' ,'Add Category',['for' => 'cname'] )}}
                             {{Form::text( 'category_name' ,'',['class' => 'form-control' ,'minlength' => '2' ])}}


                         </div>
                              {{Form::submit( 'Save' ,['class' => 'btn btn-primary'] )}}

                               {!!Form::close()!!}
                                   
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@section('scripts')
/<script src="{{asset('frontend/js/bt-maxlength.js')}}"></script>

@endsection


