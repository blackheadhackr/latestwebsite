@extends('common.adminlayout'){{-- include template --}}
@section('title','Jokes Point : Jokes Image'){{-- include Dynamic title --}}
@section('pagename','Jokes Image'){{-- include Page name--}}
@section('main'){{-- include main content section--}}
<div class="container p-3">
    <div class="row">
        {{-- ================== Category ================== --}}
        <div class="col-md-12 col-sm-12">
            <form class="row g-3" action="{{route('addjokesimg')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="catg" class="form-label">Category<span class="text-danger">*</span></label>
                    <select class="form-select @error('catgselect') {{'is-invalid'}} @enderror" aria-label="Default select example" id="catg" name="catgselect">
                        <option selected>Choose Your Category......</option>
                        @foreach ($catg as $cat)
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">@error('catgselect') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    <label for="jokestitle" class="form-label">Jokes Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jokestitle') {{ 'is-invalid' }} @enderror"
                        id="jokestitle" name="jokestitle" value="{{ old('jokestitle') }}">
                        <span class="text-danger">@error('jokestitle') {{$message}} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Jokes Image<span class="text-danger">*</span></label>
                    <input class="form-control @error('jokeimg') {{'is-invalid'}} @enderror" type="file" id="formFile" name="jokeimg">
                    <span class="text-danger">@error('jokeimg') {{$message}} @enderror</span>
                </div>
                <div class="col-md-12">
                    <label for="jokesdesc" class="form-label">Jokes description<span class="text-danger">*</span></label>

                    <textarea class="form-control @error('jokesdesc') {{ 'is-invalid' }} @enderror" placeholder="Please write about your jokes in 100-159 character" id="floatingTextarea2" style="height: 100px" id="jokesdesc" name="jokesdesc">{{ old('jokesdesc') }}</textarea>


                        <span class="text-danger">@error('jokesdesc'){{$message}}@enderror</span>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            
        </div>
    </div>
    <div class="container my-3 border rounded">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S.no</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $sn = 1;
                @endphp
                @foreach ($jokeimg as $data)    
                <tr>
                  <th scope="row">{{$sn}}</th>
                  <td><img src="{{asset('storage/'.$data->image)}}" alt="" style="max-width:100px; height:auto;"></td>
                  <td>{{$data->title}}</td>
                  <td>{{$data->catg}}</td>
                  <td><a href="{{asset('storage/'.$data->image)}}" class="btn btn-warning text-white" target="_blank"><i class="bi bi-eye-fill"></i></a>
                  <a href="#" class="btn btn-success"><i class="bi bi-pen-fill"></i></a>
                  <a href="#" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                @php
                    $sn++
                @endphp
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
@endsection