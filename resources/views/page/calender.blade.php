@extends('admin.layouts.app')

@section('page-title', 'Calendar')

@section('content')
    <x-common.page-breadcrumb pageTitle="Calendar" />
    <x-calender-area />
@endsection