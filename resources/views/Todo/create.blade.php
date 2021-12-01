@extends('layout')

@section('title')
    Add new Todo
@endsection

@section('head')
@endsection

@section('content')
<div class="text-center">
    <h1>Add new Todo</h1>
</div>
@include('components.validation-error')
<form action="{{route('store')}}" method="POST">
    @csrf 
    <div class="form-group">
        <label>Title <span class="text-danger"> *</span></label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label>Description <span class="text-danger"> *</span></label>
        <textarea name="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{route('index')}}" class="btn btn-outline-dark">Back To List</a>
</form>
@endsection

@section('scripts')
@endsection