<div class="row form-group">
    {{ Form::label('title','Title',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::text('title',null,['placeholder'=>'Enter Title','class'=>'form-control']) }}
    </div>
</div>


{{-- main category --}}
<div class="row form-group">

    @if(@$information)

    <object data="{{ asset('uploads/'.@$information->pdf) }}" type="application/pdf">
        <embed src="{{ asset('uploads/'.@$information->pdf) }}" type="application/pdf" />
    </object>

    @endif
    {{ Form::label('pdf','PDF',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::file('pdf',null,['class'=>'form-control']) }}
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
        <input name="url" type="hidden" id="url" value="{{ url('get-sub-category') }}">

    </div>
</div>
