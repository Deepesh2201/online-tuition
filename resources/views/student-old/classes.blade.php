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
                <h3>Scheduled Classes</h3>
                
            </div>

            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Meeting ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $class->meeting_id }}</td>
                                <td>{{ $class->status }}</td>
                                <td>{{ $class->subjects }}</td>
                                <td>{{ $class->batch }}</td>
                                <td>{{ $class->topics }}</td>
                                <td>{{ $class->start_time }}</td>
                                <td>{{ $class->duration }}</td>
                                <td>
                                    @if ($class->is_completed == 0)

                                        <a href="{{ $class->join_url }}" target="_blank"><button
                                                class="btn btn-sm btn-success"><span class="fa fa-play-circle "></span> Join
                                                Class</button></a>
                                    @else
                                        <button
                                                class="btn btn-sm btn-warning" data-toggle="modal" data-target="#openreviewsmodal" onclick="openfeedbackmodal('{{$class->class_id}}','{{$class->subject_id}}','{{$class->tutor_id}}')"><span class="fa fa-check "></span> Give Feedback</button>
                                    @endforelse

                                </td>
                                {{-- <td><button class="btn btn-sm btn-primary"
                                    onclick="openstudentmodal({{ $liveclass->batch_id }});"><span
                                        class="fa fa-search"></span> Start Class</button>
                            </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>
                {{-- <form action="{{ route('tutor.liveclass.store') }}" method="POST">
                    @csrf
                    <input type="text" id="url" name="url"
                        value="{{ url()->full() }}">{{ url()->full('code') }}
                    <button type="submit" class="success">Submit</button>
                </form> --}}
                <br>

                {{-- <form action="{{ route('tutor.liveclass.getuser') }}" method="GET">
                    @csrf
                    <input type="text" id="zuser" name="zuser"><button type="submit" class="success">Submit</button>
                </form> --}}

            </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="openreviewsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4" id="header">Add Feedback</h3>
                        </header>
                       
                        <form action="{{route('student.feedback.submit')}}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="subject_id" name="subject_id">
                            <input type="hidden" id="tutor_id" name="tutor_id">
                            <div class="row">
                             
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Rating<span style="color:red">*</span></label>
                                    <select type="text" class="form-control" id="rating" name="rating" required>
                                        <option value="0">0</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4">4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>

                                    </select>

                                </div>
                                <span class="text-danger">
                                    @error('rating')
                                    {{ $message }}
                                    @enderror
                                </span>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Comments<span style="color:red">*</span></label>
                                    <textarea type="text" class="form-control" id="comments" name="comments" required>
                                    </textarea>
                                </div>
                                <span class="text-danger">
                                    @error('comments')
                                    {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <button type="submit" id="" class="btn btn-sm btn-success float-right"><span
                                class="fa fa-check"></span> Submit</button>
                        <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                            data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <script>
            function openfeedbackmodal(id,subjectid,tutorid) {
                $('#id').val(id)
                $('#subject_id').val(subjectid)
                $('#tutor_id').val(tutorid)
                $('#openreviewsmodal').modal('show');
               

            }

        </script>
    @endsection
