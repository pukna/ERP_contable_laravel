@extends('layout.main')
@section('content')
    @if(session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
    @endif
    <section>
        <div class="container-fluid">
            @if(in_array("suppliers-add", $all_permission))
                <a href="{{route('supplierImp.create')}}" class="btn btn-info"><i class="dripicons-plus"></i> {{trans('Add Proveedor')}}</a>
            @endif
        </div>

    <script type="text/javascript">
        $("ul#people").siblings('a').attr('aria-expanded','true');
        $("ul#people").addClass("show");
        $("ul#people #supplier-create-menu").addClass("active");
    </script>
@endsection
