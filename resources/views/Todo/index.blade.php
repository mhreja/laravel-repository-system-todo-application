@extends('layout')

@section('title')
    My Todo
@endsection

@section('head')
@endsection

@section('content')
<div class="text-center">
    <h1>My Todo</h1>
    <a href="{{route('create')}}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> Add New Todo
    </a>
</div>
<div class="row my-2">
    @foreach ($todos as $item)
        <div class="col-md-3 py-2">
            <div class="card {{$item->is_done == NULL ? 'bg-dark' : 'bg-success'}}" >
                <div class="card-body text-white">
                    <h5 class="card-title">{{$item->title}}
                        @if ($item->is_done != NULL)
                            <span class="badge badge-sm badge-warning">#Done</span>
                        @endif                        
                    </h5>                
                    <p class="card-text text">{{$item->description}}</p>                    
                    
                    <form action="{{route('destroy', $item->id)}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <a href="{{route('edit', $item->id)}}" class="card-link btn btn-sm btn-light text-info"><i class="fa fa-edit"></i></a>
                        @if ($item->is_done == NULL)
                            <a href="{{route('markdone', $item->id)}}" class="card-link text-white">Mark as Done</a>
                        @endif
                        <button type="submit" class="card-link btn btn-sm btn-light text-danger float-right"><i class="fa fa-trash"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')
@endsection