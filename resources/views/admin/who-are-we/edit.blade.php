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


                                {!! Form::model($information,['route' => ['who-are-we.update',$information->id], 'method' => 'post','files'=>true]) !!}

                                @csrf
                                @method('PUT')
                                <hr>
                                <div class="form-group">

                                {{ Form::label('who_are_we','Change Term For Module') }}

                                {{ Form::text('who_are_we',$setting->who_are_we,['class'=>'form-control','required'=>'required']) }}
                                </div>
                                <hr>
                                @include('admin.who-are-we.form')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="{{route($base_route)}}">
                                        Close
                                    </a>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>

                        {{-- create form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('user::common.users.links') --}}




@endsection
