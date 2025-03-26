@extends('common.adminlayout'){{-- include template --}}
@section('title', 'Dashboard'){{-- include Dynamic title --}}
@section('pagename', 'Category') {{-- include Page name --}}
@section('main'){{-- include main content section --}}
    <div class="container p-3">
      <div class="row">
        {{-- ================== Category ================== --}}
        <div class="col-md-6 col-sm-12">
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
        <div class="container border my-3">
          <table class="table" id="datatbl">
            <thead>
              <tr>
                <th scope="col">S. no.</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @php
                $sno = 1;
              @endphp
              @foreach ($data as $a)
              <tr>
                <th scope="row">{{$sno}}</th>
                <td>{{$a->name}}</td>
                <td> 
                  <button type="button" class="btn btn-success" id="{{$a->id}}"><i class="bi bi-pencil-square"></i></button>
                  <button type="button" class="btn btn-danger" id="{{$a->id}}"><i class="bi bi-trash-fill"></i></button>
                </td>
              </tr>
              @php
                $sno++
              @endphp
              @endforeach
              
            </tbody>
          </table>
        </div>
        </div>
        {{-- ================== Tags ================== --}}
        <div class="col-md-6 col-sm-12">
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
<script>
  $(document).ready(function() {

new DataTable('#datatbl', {
    // paging: false,
    scrollCollapse: true,
    scrollY: '200px'
});
} );
</script>
@endsection
