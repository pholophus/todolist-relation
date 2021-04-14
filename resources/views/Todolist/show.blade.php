@extends('Todolist.layout')
  
@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Todo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('list') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('store') }}" method="">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Todo:</strong>
                <input type="text" name="todo" value="{{ $todolist->todo }}" class="form-control" placeholder="Enter Title" disabled>
            </div>
        </div>
    </div>
   
</form>
@endsection