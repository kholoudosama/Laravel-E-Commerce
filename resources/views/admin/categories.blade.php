
@extends('layouts.appadmin')
@section('title')
Categories
@endsection

@section('content')         


<!-- {{Form::hidden('',$increment = 2)}} -->

<div class="card">
            <div class="card-body">
              <h4 class="card-title">Categories</h4>
              @if(Session::has('status'))
                                  <div  class="alert alert-success">
                                       {{Session::get('status')}}
                                  </div>
                             @endif
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($Categories as $Category)
                        <tr>
                        <!-- display from table *category_name  ,id *-->
                            <td>{{$Category->id}}</td>
                            <td>{{$Category->category_name}}</td>  
                            <td>

                              <button class="btn btn-outline-primary"
                               onclick="window.location='{{url('/edit_category/' .$Category->id)}}' ">Edite</button>
                             
                              <a class="btn btn-outline-danger" id="delete" href="/delete/{{$Category->id}}"
                             >Delete</a>
                            </td>
                        </tr>
                        @endforeach

                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- {{Form::hidden('', $increment = $increment + 1)}} -->


@endsection



@section('scripts')
<script src="{{asset('frontend/js/data-table.js')}}"></script>
@endsection


