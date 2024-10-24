@extends('student.layouts.main')
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

            <div id="listHeader" class="mb-3">
                <h3>My Assignments</h3>
            </div>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class.</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Assignment Name</th>
                            <th scope="col">Assignment Description</th>
                            <th scope="col">Assignment Link</th>
                            <th scope="col">Assignment Start Date</th>
                            <th scope="col">Assignment End Date</th>
                            <th scope="col">View Submission</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($assignments as $assignment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assignment->class }}</td>
                                <td>{{ $assignment->subject }}</td>
                                <td>{{ $assignment->topic }}</td>
                                <td>{{ $assignment->batch }}</td> 
                                <td>{{ $assignment->assignment_name }}</td>
                                <td>{{ $assignment->assignment_description }}</td>
                                <td><a href="{{ url('uploads/documents/assignments') }}/{{ $assignment->assignment_link }}"
                                        target="_blank"><button class="badge badge-primary">View
                                            Assignment</button></td>
                                <td>{{ $assignment->assignment_start_date }}</td>
                                <td>{{ $assignment->assignment_end_date }}</td>
                                <td>
                                    @php
                                        $isSubmitted = false;
                                        foreach ($submissions as $submission) {
                                            if ($submission->assignment_id == $assignment->assignment_id) {
                                                $isSubmitted = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if ($isSubmitted)
                                        <a class="btn btn-sm btn-success"
                                            ><span class="fa fa-check"></span> Assignment Submitted</a>
                                    @else
                                        <button class="btn btn-sm btn-primary"
                                            onclick="openmodal('{{ $assignment->assignment_id }}');" data-toggle="modal"
                                            data-target="#openmodal"><span class="fa fa-cloud-upload"></span> Submit Assignment</button>
                                    @endif
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

        <!-- modal -->
        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4" id="header">Upload Assignment</h3>
                        </header>

                        <form action="{{ route('student.assignments.upload') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="row">

                                <div class="col-12 col-md-12 col-ms-6 mb-3">
                                    <label>Upload Assignment<span style="color:red">*</span></label>
                                    <input type="file" class="form-control" id="assigupload" name="assigupload">
                                    <span class="text-danger">
                                        @error('assigupload')
                                            {{ 'Assignment is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-12 col-ms-6 mb-3">
                                    <label>Remarks</label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks..."></textarea>
                                    <span class="text-danger">
                                        @error('remarks')
                                            {{ 'Remarks is required' }}
                                        @enderror
                                    </span>
                                </div>

                            </div>


                            <button type="submit" id="" class="btn btn-sm btn-success float-right"><span
                                    class="fa fa-upload"> </span> Upload</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                    class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openmodal(id) {
                $('#header').html('Upload Assignment');
                $('#id').val(id);
                $("#openmodal").modal('show');
            }
        </script>
    @endsection
