@extends('common.adminlayout'){{-- include template --}}
@section('title', 'Catg & Tags'){{-- include Dynamic title --}}
@section('pagename', 'Category & Tags') {{-- include Page name --}}
@section('main'){{-- include main content section --}}
    <div class="container p-3">
        <div class="row">
            {{-- ================== Category ================== --}}
            <div class="col-md-6 col-sm-12">
                <form class="row g-3" action="{{ route('add-category') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="catgname" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('catgname') {{ 'is-invalid' }} @enderror"
                            id="catgname" name="catgname" value="{{ old('catgname') }}">
                        <span class="text-danger">
                            @error('catgname')
                                {{ $message }}
                            @enderror
                        </span>
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
                                    <th scope="row">{{ $sno }}</th>
                                    <td>{{ $a->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success catgedit" id="{{ $a->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" id="{{ $a->id }}"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                                @php
                                    $sno++;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- ================== Tags ================== --}}
            <div class="col-md-6 col-sm-12">
                <form class="row g-3" action="{{route('add-tags')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="catgname" class="form-label">Tag Name</label>
                        <input type="text" class="form-control @error('tagsname') {{'is-invalid'}} @enderror" id="catgname" name="tagsname" value="{{old('tagsname')}}">
                        <span class="text-danger">@error('tagsname') {{$message}} @enderror</span>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>
                </form>
                <div class="container border my-3">
                  <table class="table" id="datatbll">
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
                      @foreach ($tags as $a)
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
        </div>
        {{-- model catg --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Category Edit</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="categoryeditform">
                    @csrf
                    <input type="hidden" class="form-control" id="editctgid" name="id">
                    <div class="mb-3">
                      <label for="editctg" class="col-form-label">Edit Category Name:</label>
                      <input type="text" class="form-control" id="editctg" name="edtctg">
                      <span class="text-danger" id="cater"></span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    <script>
        $(document).ready(function() {

            new DataTable('#datatbl', {
                // paging: false,
                scrollCollapse: true,
                scrollY: '500px'
            });

            new DataTable('#datatbll', {
                // paging: false,
                scrollCollapse: true,
                scrollY: '500px'
            });
        });
        // get single data using ajax code
        $(document).ready(function() {
            $(document).on('click','.catgedit', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"{{route('get_singlecatg')}}",
                    type:"post",
                    data:{_token: '{{ csrf_token() }}',
                        "id":id},
                    success:function(data){
                        $('#editctg').val(data.name);
                        $('#editctgid').val(data.id);
                    }
                })
            });  
        // form submit edit category
        $(document).on('submit',"#categoryeditform",function(e){
            e.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url:"{{route('categoryeditsubmit')}}",
                type:"post",
                dataType:"json",
                data: $(this).serialize(),
                success:function(data){
                    // success message
                },
                error: function(err) {
                    if (err.status === 422) {
                        var errors = err.responseJSON.error;
                        if(errors.edtctg){
                            $('#cater').text(errors.edtctg[0]);
                        }
                    } else {
                        $('#cater').text("An unexpected error occurred.");
                    }
                }
            });
        });
        });
    </script>
@endsection
