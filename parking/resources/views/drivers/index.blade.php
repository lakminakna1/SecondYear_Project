@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">drivers</h1>
     <div>
    <a style="margin: 19px;" href="{{ route('drivers.create')}}" class="btn btn-primary">New driver</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Job Title</td>
          <td>City</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
        <tr>
            <td>{{$driver->id}}</td>
            <td>{{$driver->first_name}} {{$driver->last_name}}</td>
            <td>{{$driver->email}}</td>
            <td>{{$driver->job_title}}</td>
            <td>{{$driver->city}}</td>
            <td>{{$driver->country}}</td>
            <td>
                <a href="{{ route('drivers.edit',$driver->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('drivers.destroy', $driver->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>


<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
@endsection
