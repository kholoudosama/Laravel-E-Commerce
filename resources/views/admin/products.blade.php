
@extends('layouts.appadmin')
@section('title')
Products
@endsection

@section('content')         




<div class="card">
            <div class="card-body">
              <h4 class="card-title">Product</h4>
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
                            <th>Image </th>
                            <th>Name</th>
                            <th>Price to</th>
                            <th> Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($Products as $Product)
                        <tr>
                            <td>{{  $Product->id}}</td>
                            <td><img src="/storage/product_images/{{$Product->product_image}}"></td>
                            <td>{{  $Product->product_name}}</td>
                            <td>{{  $Product->product_price}}</td>
                            <td>{{ $Product->product_category}}</td>
                             @if($Product->product_status ==1)
                                <td>
                                  <label class="badge badge-success" >Activated</label>
                                </td>
                             @else
                             <td>
                                  <label class="badge badge-danger" >Unactivated</label>
                                </td>
                             @endif
                            <td>                           
                            <!-- <button class="btn btn-outline-primary">View</button> -->
                              <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_product/'.$Product->id)}}' ">Edite</button>
                              <a href="/delete_product/{{$Product->id}}} " class="btn btn-outline-danger" id="delete">Delete</a>
                               @if($Product->product_status ==1)
                               <button class="btn btn-outline-warning" onclick="window.location='{{url('/unactivate_product/'.$Product->id)}}' ">Unactivated</button>
                               @else
                               <button class="btn btn-outline-success" onclick="window.location='{{url('/activate_product/'.$Product->id)}}' ">Activated</button>
                               @endif
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

          

@endsection



@section('scripts')
<script src="{{asset('frontend/js/data-table.js')}}"></script>
@endsection


