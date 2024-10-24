@extends('admin.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">



 <!--==============================================================-->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <style>
        .listHeader {
            display: flex;
            justify-content: space-between;
        }
        </style>

        <div class="page-content">
            <div class="container-fluid">
                <!-- <h3 class="text-center"></h3> -->
                <div id="" class="mb-3 listHeader page-title-box">
                    <h3>Blogs</h3>
                    <div class="dropdown">
                        <a href="/admin/blogs/create">  <button class="btn btn-primary" type="button" id="dropdownMenuButton"
                            data-toggle="" aria-haspopup="true" aria-expanded="false">
                            Add New Blog
                        </button>
                        </a>
                       
                    </div>
                </div>

                <table class="table table-hover table-striped align-middlemb-0 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Banner</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->name }}</td>
                            <td>{!! $blog->description !!}</td>
                            <td><img src="{{url('/images/blogs/'. $blog->image) }}" width="50px"></td>
                            <td><img src="{{url('/images/blogs/'. $blog->banner) }}" width="50px"></td>
                            {{-- <td><div ><textarea class="form-control">{{$question->question}}</textarea>
            </div>
            </td> --}}
            <td>
                <div class="form-check form-switch text-nowrap">
                    @if ($blog->is_active == 1)
                    <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
                    @else
                    <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
                    @endif
                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1"
                        onclick="changestatus('{{ $blog->id }}','{{ $blog->is_active }}');"
                        class="checkbox" @if ($blog->is_active == 1) then checked @endif>
                </div>
            </td>


            <td>
                <div class="text-center"><a class="btn btn-sm bg-primary text-white"
                        href="{{ url('admin/blogs/update') . '/' . $blog->id }}">View/Update</a>
                </div>
            </td>
            </tr>
            @endforeach

            </tbody>
            </table>

        </div>
        <!-- content-wrapper ends -->
        <script>
            function changestatus(id, status) {

                var url = "{{ URL('admin/blogs/status') }}";
                // var id= 
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/admin/blogs";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                }); 
            }           
        </script>
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js" > </script>
        <script>
            function changestatus(id, status) {

                var url = "{{ URL('admin/blogs/status') }}";
                // var id=
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/admin/blogs";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }

            
        </script>
        <script>
            function updateTableAndPagination(data) {
                // $('#tableContainer').html(data.table);
                $('.users-table tbody').html(data.table);
                $('#paginationContainer').html(data.pagination);
            }

            $(document).ready(function() {
                $('#payment-search').submit(function(e) {
                    e.preventDefault();
                    const page = 1;
                    const ajaxUrl = "{{ route('admin.questionbank-search') }}"
                    var formData = $(this).serialize();

                    formData += `&page=${page}`;

                    $.ajax({
                        type: 'post',
                        url: ajaxUrl, // Define your route here
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(data) {
                            // console.log(data)
                            updateTableAndPagination(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });

                });


                $(document).on('click', '#paginationContainer .pagination a', function(e) {
                    e.preventDefault();
                    var formData = $('#payment-search').serialize();
                    const page = $(this).attr('href').split('page=')[1];
                    formData += `&page=${page}`;
                    $.ajax({
                        type: 'post',
                        url: "{{ route('admin.questionbank-search') }}", // Define your route here
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            updateTableAndPagination(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });



            });
        </script>
        @endsection