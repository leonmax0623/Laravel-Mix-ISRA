@extends('layout.admin')

@section('main')
    <x-admin.blog.post :post="$post ?? NULL"/>
@endsection
