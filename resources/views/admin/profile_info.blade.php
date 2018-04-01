@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
@endsection