@extends('Todolist.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Todolist ({{$user->name}})</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Dashboard</a>
                <a class="btn btn-success" href="{{ route('create') }}"> Create New Todo</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Todo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->todo }}</td>
            <td>
                <form action="{{ route('destroy',$value) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>     
@endsection