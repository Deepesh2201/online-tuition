@extends('admin.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <h3 class="text-center">Tutors List</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Tutor Name</th>
                            <th scope="col">Tutor Mobile</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Rate/Hr</th>
                            <th scope="col">Commission/Hr</th>
                            <th scope="col">Current Status</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ttrlists as $ttrlist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="tutorprofile/{{ $ttrlist->tutor_id }}">{{ $ttrlist->tutor_name }}</a></td>
                                <td>{{ $ttrlist->tutor_mobile }}</td>

                                <td>{{ $ttrlist->subject_name }}</td>
                                <td>{{ $ttrlist->rate }}</td>
                                <td><a href="#" onclick="updatecommission('{{$ttrlist->rate_id}}','{{$ttrlist->admin_commission}}')"> {{ $ttrlist->admin_commission }} <span class="badge badge-primary ml-3"> Update</span> </a>
                                </td>
                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox"
                                                    onclick="changestatus('{{ $ttrlist->tutor_id }}','{{ $ttrlist->tutor_status }}');"
                                                    class="checkbox" @if ($ttrlist->tutor_status == 1) then checked @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                             </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $ttrlists->links() !!} --}}
                </div>

                <!--confirm modal -->
                <div class="modal fade" id="admincommissionmodal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <div class="modal-body">


                                <header>
                                    <h3 class="text-center mb-4">Admin Commission</h3>
                                </header>

                                {{-- <form action="{{ route('admin.demo.confirm') }}" method="POST">
                        @csrf --}}
                                <div class="row mb-3">
                                    <input type="hidden" id="commissionid" name="commissionid">

                                    <div class="col-12 col-md-4 col-ms-12">
                                        <label>Commission/Hr<i style="color: red;">*</i></label>
                                        <input type="text" class="form-control" id="commissionperhr"
                                            name="commissionperhr" placeholder="0">
                                        <span class="text-danger">
                                            @error('commissionperhr')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-ms-12" style="margin-top:35px">
                                        <button type="button" id="" class="btn btn-sm btn-success float-right"
                                            onclick="commissionupdate();"><span class="fa fa-check"></span> Update</button>
                                        <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                            data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                                    </div>

                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <script>
            function changestatus(id, status) {

                var url = "{{ URL('admin/tutors/status') }}";
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
                            window.location = "/admin/tutors";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }

            function updatecommission(id,rate) {
                $('#commissionid').val(id);
                $('#commissionperhr').val(rate);
                $('#admincommissionmodal').modal('show')
            }
            function commissionupdate(){
                var url = "{{ URL('admin/commission/update') }}";
                var id= $('#commissionid').val()
                var commission= $('#commissionperhr').val()
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        commission: commission
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/admin/tutors";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });
            }
        </script>
    @endsection
