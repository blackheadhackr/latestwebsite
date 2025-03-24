@extends('common.adminlayout'){{-- include template --}}
@section('title','Dashboard'){{-- include Dynamic title --}}
@section('pagename','Category') {{-- include Page name--}}
@section('main'){{-- include main content section--}}
<div class="container p-3">
    <form class="row g-3">
        <div class="col-md-6">
          <label for="catgname" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="catgname" name="catgname">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit Form</button>
        </div>
      </form>
</div>

@endsection