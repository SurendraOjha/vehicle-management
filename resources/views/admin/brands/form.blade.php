<div class="row form-group">
  {{ Form::label('title','Brand Name',["class"=>"col-sm-2 control-label required"]) }}
  <div class="col-sm-10">
      {{ Form::text('title',null,['placeholder'=>'Brand Name','class'=>'form-control']) }}
  </div>
</div>

{{-- display order --}}
<div class="row form-group">
    {{ Form::label('order','Display Order',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">

        {{ Form::text('order',null,['placeholder'=>'Display Order','class'=>'form-control']) }}
    </div>
  </div>

{{-- status --}}
  <div class="row form-group">
    {{ Form::label('status','Status',["class"=>"col-sm-2 control-label"]) }}

    <div class="col-sm-10">

        @php
            $status = [
                ''=>'Choose Option',
                '1'=>'Active',
                '0'=>'InActive'
            ];
        @endphp

        {{ Form::select('status',$status,null,['class'=>"form-control"]) }}

    </div>
  </div>

