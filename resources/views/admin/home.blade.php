@extends('common.adminlayout'){{-- include template --}}
@section('title', 'Dashboard'){{-- include Dynamic title --}}
@section('pagename', 'Category') {{-- include Page name --}}
@section('main'){{-- include main content section --}}
    <div class="container p-3">
      <div class="row">
        <div class="col-6">
          <form class="row g-3" action="{{route('add-category')}}" method="POST">
            @csrf
            <div class="col-md-12">
                <label for="catgname" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('catgname') {{'is-invalid'}} @enderror" id="catgname" name="catgname" value="{{old('catgname')}}">
                <span class="text-danger">@error('catgname') {{$message}} @enderror</span>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
        </form>
        </div>
        <div class="col-6">
          <form class="row g-3" action="#" method="POST">
            @csrf
            <div class="col-md-12">
                <label for="catgname" class="form-label">Tag Name</label>
                <input type="text" class="form-control" id="catgname" name="catgname">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
        </form>
        </div>
      </div>





        
    </div>

@endsection
