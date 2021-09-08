@extends('backend.layouts.main')

@section('title','प्रशासक')

@section('content')


<div class="col-12 col-sm-12 col-md-12 col-lg-9 dashboard-right">
  <div class="row">
    <div class="col-6 col-sm-6">
      <h2>
        प्रशासक मिलाउने
      </h2>
    </div>
    <div class="col-6 col-sm-6">
      <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">मिनी नेपाल ड्यासवोर्ड</a></li>
          <li class="breadcrumb-item active">
            प्रशासक मिलाउने
          </li>
        </ol>
    </div>
    <div class="col-md-12">

      {{ Form::model($information,['method'=>'PUT','route'=>['school-user.update',$information->id]]) }}
          @csrf
          @include('backend.admin.form')
      {{ Form::close() }}
    </div>
  </div>
</div>

  @endsection

