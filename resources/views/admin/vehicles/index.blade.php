@extends('layouts.main')

@section('title')
{{ $_panel }}

@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $_panel }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search -->
            <div class="col-12">
                <div class="card">
                    <form action="{{route($base_route)}}" method="get">
                        <div class="body">
                            <div class="row">
                                {{-- Category --}}
                                <div class="col-lg-3 col-md-6">
                                    {{ Form::label('category_id','Main Category') }}


                                    {{ Form::select('category_id',$search_categories,@$category_id,[ "class"=>"form-control",'placeholder'=>'Select Category']) }}

                                </div>

                                {{-- sub category --}}
                                <div class="col-lg-3 col-md-6">
                                    {{ Form::label('sub_category_id','Sub Category') }}


                                    <select name="sub_category_id" id="sub_category_id_search" class="form-control">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>


                                <input type="hidden" id="selected_sub_category_id" name="selected_sub_category_id" value="{{ $sub_category_id }}">

                                {{-- brand --}}

                                <div class="col-lg-3 col-md-6">
                                    {{ Form::label('brand_id','Brand') }}

                                    {{ Form::select('brand_id',$brands,$brand_id,[ "class"=>"form-control","placeholder"=>"Select Brand"]) }}

                                </div>


                                {{-- price range --}}

                                <div class="col-lg-3 col-md-6">
                                    {{ Form::label('price_from','Price From') }}

                                    {{ Form::number('price_from',@$price_from,['class'=>'form-control','id'=>'price_from']) }}

                                    {{ Form::label('price_to','Price ToFrom') }}

                                    {{ Form::number('price_to',@$price_to,['class'=>'form-control','id'=>'price_to']) }}
                                </div>


                                <div class="col-lg-2 col-md-6">

                                    <button type="submit" class="btn btn-sm btn-primary btn-block">Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <input name="url" type="hidden" id="url" value="{{ url('get-sub-category') }}">

                </div>
            </div>


            <a class="btn btn-success" href="{{ route('vehicle.create') }}">Create Vehicle</a>


            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link @if(!session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#Users">{{ $_panel }}
                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  @if(!session()->get('errors')) active show @endif" id="Users">
                            <div class="table-responsive">



                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count =1;
                                        @endphp

                                        @foreach ($informations as $value)

                                        <tr>
                                            <td>

                                                {{ $count++ }}

                                            </td>


                                            <td>{{ $value->category->title }}</td>

                                            <td>{{$value->title}}</td>
                                            <td>{{ $value->brand->title }}</td>

                                            <td>{{ $value->price }}</td>

                                            <td>
                                                @if($value->status)
                                                Active
                                                @else
                                                InActive
                                                @endif

                                            </td>
                                            <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                                            <td>

                                                {{-- <a href="{{route('vehicle.edit',$value->id)}}"> <i
                                                        class="icon-pencil"></i> </a>
                                                </a> --}}



                                                <form method="post" action="{{ route('vehicle.destroy',$value->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
        </div>
    </div>
</div>
{{-- @include('user::common.users.links') --}}




@endsection
