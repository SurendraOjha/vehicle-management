<div class="row form-group">
    {{ Form::label('title','Vehicle',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::text('title',null,['placeholder'=>'Vehicle','class'=>'form-control']) }}
    </div>
</div>


{{-- main category --}}
<div class="row form-group">
    {{ Form::label('parent','Main Category',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::select('category_id',$categories,null,['placeholder'=>'Main Category','class'=>'form-control']) }}
    </div>
</div>



{{-- sub category id --}}
<div class="row form-group">

    {{ Form::label('sub_category_id','Sub Category',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::select('sub_category_id',[],null,['placeholder'=>'Select Sub Category','class'=>'form-control']) }}
    </div>

</div>



{{-- brand --}}
<div class="row form-group">
    {{ Form::label('brand_id','Brand',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::select('brand_id',$brands,null,['placeholder'=>'Choose Brand','class'=>'form-control']) }}
    </div>
</div>


{{-- price --}}



<div class="row form-group">
    {{ Form::label('price','Price',["class"=>"col-sm-2 control-label required"]) }}
    <div class="col-sm-10">
        {{ Form::text('price',null,['placeholder'=>'Price','class'=>'form-control']) }}
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
