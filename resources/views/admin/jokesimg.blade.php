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
                    <label for="jokestitle" class="form-label">Jokes Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jokestitle') {{ 'is-invalid' }} @enderror"
                        id="jokestitle" name="jokestitle" value="{{ old('jokestitle') }}">
                        <span class="text-danger">@error('jokestitle') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    <label for="jokesdesc" class="form-label">Jokes description<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jokesdesc') {{ 'is-invalid' }} @enderror"
                        id="jokesdesc" name="jokesdesc" value="{{ old('jokesdesc') }}" placeholder="Please write about your jokes in 100-159 character">
                        <span class="text-danger">@error('jokesdesc'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Jokes Image<span class="text-danger">*</span></label>
                    <input class="form-control @error('jokeimg') {{'is-invalid'}} @enderror" type="file" id="formFile" name="jokeimg">
                    <span class="text-danger">@error('jokeimg') {{$message}} @enderror</span>
                  </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection