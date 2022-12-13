@extends('layout.main')
@section('content')
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<h1> Factura Numero 00000001</h1>



<script type="text/javascript">
    $("ul#purchase").siblings('a').attr('aria-expanded','true');
    $("ul#purchase").addClass("show");
    $("ul#purchase #purchase-invoice-menu").addClass("active");
</script>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
@endsection
