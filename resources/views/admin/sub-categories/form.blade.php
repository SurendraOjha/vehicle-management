<div class="row form-group">
  {{ Form::label('title','Category Name',["class"=>"col-sm-2 control-label required"]) }}
  <div class="col-sm-10">
      {{ Form::text('title',null,['placeholder'=>'Category Name','class'=>'form-control']) }}
  </div>
</div>


{{-- main category --}}
<div class="row form-group">
    {{ Form::label('parent','Main Category',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::select('parent',$categories,null,['placeholder'=>'Main Category','class'=>'form-control']) }}
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

