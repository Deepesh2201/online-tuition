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
            <h3 class="text-center">Demo List</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Mobile</th>
                            <th scope="col">Tutor Name</th>
                            <th scope="col">Tutor Mobile</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Current Status</th>
                            <th scope="col">Prefered Slot-1</th>
                            <th scope="col">Prefered Slot-2</th>
                            <th scope="col">Prefered Slot-3</th>
                            <th scope="col">Confirmed Slot</th>
                            <th scope="col">Demo Link</th>
                            <th scope="col">Remarks</th>
                            {{-- <th scope="col">Change Status</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demos as $demo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="studentprofile/{{$demo->student_id}}">{{ $demo->student_name }}</a></td>
                                <td>{{ $demo->student_mobile }}</td>
                                <td><a href="tutorprofile/{{$demo->tutor_id}}">{{ $demo->tutor }}</a></td>
                                <td>{{ $demo->tutor_mobile }}</td>
                                <td>{{ $demo->subject }}</td>
                                <td>
                                    @if ($demo->status == 1)
                                        <span class="badge badge-info">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 2)
                                        <span class="badge badge-primary">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 3)
                                        <span class="badge badge-success">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 4)
                                        <span class="badge badge-success">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 5)
                                        <span class="badge badge-danger">{{ $demo->currentstatus }}</span>
                                    @endif
                                </td>
                                <td>{{ $demo->slot_1 }}</td>
                                <td>{{ $demo->slot_2 }}</td>
                                <td>{{ $demo->slot_3 }}</td>
                                <td>{{ $demo->slot_confirmed }}</td>
                                <td><a href="{{ $demo->demo_link }}">{{ $demo->demo_link }}</a></td>
                                <td>{{ $demo->remarks }}</td>
                                <td><button class="badge badge-success"
                                        onclick="openconfirmmodal({{ $demo->demo_id }});">Confirm</button>
                                    <button class="badge badge-primary"
                                        onclick="openupdatemodal({{ $demo->demo_id }})">Modify</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <!--confirm modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Confirm Demo</h3>
                        </header>

                        <form action="{{ route('admin.demo.confirm') }}" method="POST">
                            @csrf
                            <label>Select Slot to Confirm</label>
                            <div class="row mb-3">
                                <input type="hidden" id="confirmid" name="confirmid">
                                <div class="col-12 col-md-12 col-ms-12 p-2">
                                    <label class="mr-4 text-secondary">Slot 1</label>
                                    <input type="radio" id="slot1" value="" name="slot">&nbsp;<span
                                        id="slot_1"></span>
                                </div>
                                <div class="col-12 col-md-12 col-ms-12 p-2">
                                    <label class="mr-4 text-secondary">Slot 2</label>
                                    <input type="radio" id="slot2" value="" name="slot">&nbsp;<span
                                        id="slot_2"></span>
                                </div>

                                <div class="col-12 col-md-12 col-ms-12 p-2 mb-3">
                                    <label class="mr-4 text-secondary">Slot 3</label>
                                    <input type="radio" id="slot3" value="" name="slot">&nbsp;<span
                                        id="slot_3"></span>
                                </div>
                                <span class="text-danger">
                                    @error('slot')
                                        {{ $message }}
                                    @enderror
                                </span>


                                <div class="col-12 col-md-12 col-ms-12">
                                    <label>Demo Link<i style="color: red;">*</i></label>
                                    <input type="text" class="form-control" id="demolink" name="demolink"
                                        placeholder="Paste Demo Link Here">
                                    <span class="text-danger">
                                        @error('demolink')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-12 col-ms-12">
                                    <label>Remarks</label>
                                    <textarea type="text" class="form-control" id="demoremarks" name="demoremarks" value="" placeholder="Remarks"></textarea>
                                </div>

                            </div>


                            <button type="submit" id="" class="btn btn-sm btn-success float-right"><span
                                    class="fa fa-check"></span> Comfirm</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                    class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--edit modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Change Slot</h3>
                        </header>

                        <form action="{{ route('admin.demo.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-6 mb-3 ">
                                    <input type="hidden" value="" id="demoupdateid" name="demoupdateid">
                                    <label>Preferred Slot-1<i style="color: red">*</i></label>
                                    <input type="datetime-local" class="form-control" id="slotupdate1"
                                        name="slotupdate1">
                                    <span class="text-danger">
                                        @error('slotupdate1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-3 ">
                                    <label>Preferred Slot-2</label>
                                    <input type="datetime-local" class="form-control" id="slotupdate2"
                                        name="slotupdate2">
                                    <span class="text-danger">
                                        @error('slotupdate2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-3 ">
                                    <label>Preferred Slot-3</label>
                                    <input type="datetime-local" class="form-control" id="slotupdate3"
                                        name="slotupdate3">
                                    <span class="text-danger">
                                        @error('slotupdate3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-3 ">
                                    <label>Status<i style="color: red">*</i></label>
                                    <select class="form-control" id="statusupdate" name="statusupdate"
                                        placeholder="Select Status">
                                        <option value="">--Select--</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('statusupdate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <button type="submit" id="" class="btn btn-sm btn-success float-right"><span
                                    class="fa fa-check"></span> Update</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal"><span class="fa fa-times"></span> Close</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openconfirmmodal(id) {
                $.ajax({
                    url: "{{ url('admin/demodetails') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        result = result[0]
                        $('#confirmid').val(id)
                        $('#slot_1').html(result.slot_1)
                        $('#slot_2').html(result.slot_2)
                        $('#slot_3').html(result.slot_3)
                        $('#demolink').val(result.demo_link)
                        $('#demoremarks').val(result.remarks)
                        $('#slot1').val(result.slot_1)
                        $('#slot2').val(result.slot_2)
                        $('#slot3').val(result.slot_3)

                    }
                });

                $('#confirmModal').modal('show')
            }

            function openupdatemodal(id) {
                $.ajax({
                    url: "{{ url('admin/demodetails') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        result = result[0]
                        $('#demoupdateid').val(id)
                        $('#slotupdate1').val(result.slot_1)
                        $('#slotupdate2').val(result.slot_2)
                        $('#slotupdate3').val(result.slot_3)
                        $('#statusupdate').val(result.status)

                    }
                });
                $('#editModal').modal('show')
            }
        </script>
    @endsection
