<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="{{asset('admin/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/js/c3.bundle.js')}}"></script>
<script src="{{asset('admin/js/mainscripts.bundle.js')}}"></script>
{<script src="{{asset('admin/js/index.js')}}"></script>
{<script src="{{asset('admin//bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>



<!-- select 2 -->
{{-- <script src="{{asset('admin/js/select2.min.js')}}"></script> --}}



{{-- <script src="{{ asset('admin/js/datepicker.js') }}"></script> --}}


<script src="{{ asset('admin/js/ajax.js') }}"></script>



{{-- toaster --}}

<script src="{{ asset('toaster.min.js') }}"></script>


<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

</script>




<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>





{{--  ck editor --}}

{{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'ckeditor' );
</script> --}}
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/jquery.tinymce.min.js"></script>

<script>
tinymce.init({
    selector: 'textarea'
  });
</script> --}}
