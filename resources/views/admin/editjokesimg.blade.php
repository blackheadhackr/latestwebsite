@extends('common.adminlayout'){{-- include template --}}
@section('title','Jokes Point : Jokes Image'){{-- include Dynamic title --}}
@section('pagename','Edit Jokes Image'){{-- include Page name--}}
@section('main'){{-- include main content section--}}
<div class="container p-3">
    <div class="row">
        {{-- ================== Category ================== --}}
        <div class="col-md-12 col-sm-12">
            <form class="row g-3" action="{{route('updatejokesimg')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                <div class="col-md-6">
                    <label for="catg" class="form-label">Category<span class="text-danger">*</span></label>
                    <select class="form-select @error('catgselect') {{'is-invalid'}} @enderror" aria-label="Default select example" id="catg" name="catgselect">
                        <option>Choose Your Category......</option>
                        @foreach ($catg as $cat)
                        <option value="{{$cat->name}}" {{$cat->name === $data->catg ? 'selected' : ''}}>{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">@error('catgselect') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    <label for="jokestitle" class="form-label">Jokes Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jokestitle') {{ 'is-invalid' }} @enderror"
                        id="jokestitle" name="jokestitle" value=" {{ old('jokestitle', $data->title) }}">
                        <span class="text-danger">@error('jokestitle') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="formFile" class="form-label">Jokes Image<span class="text-danger">*</span></label>
                    <input class="form-control @error('jokeimg') {{'is-invalid'}} @enderror" type="file" id="formFile" name="jokeimg">
                    <span class="text-danger">@error('jokeimg') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="formFile" class="form-label">Current Image<span class="text-danger">* </span></label>
                    <img src="{{asset('storage/'.$data->image)}}" alt="this is image" style="width:150px" class="border rounded p-2">
                </div>
                <div class="col-md-12">
                    <label for="jokesdesc" class="form-label">Jokes description<span class="text-danger">*</span></label>

                    <textarea class="form-control jkup @error('jokesdesc') {{ 'is-invalid' }} @enderror" placeholder="Please write about your jokes in 100-159 character" id="floatingTextarea2" style="height: 100px" id="jokesdesc" name="jokesdesc">{{ old('jokesdesc', $data->desc) }}</textarea>
                    <span class="text-danger">@error('jokesdesc'){{$message}}@enderror</span> 
                    <br><span class="text-danger charCount"></span>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.jkup').on('input', function() {
            var input = $(this).val();
            var sum = 156 - input.length;
            
            if (input.length > 156) {
            input = input.substring(0, 156);
            $(this).val(input);
            }

            $('.charCount').text("only "+sum+" charecter left");
        });
    });
</script>
@endsection