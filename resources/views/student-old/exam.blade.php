@extends('student.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div id="listHeader">
                <h3 class="mb-3">My Examination</h3>

            </div>
            @if (request()->has('message'))
                <div class="alert alert-success">
                    {{ urldecode(request()->get('message')) }}
                </div>
            @endif
            <table class="table table-bordered table-responsive">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Exam Description</th>
                        <th scope="col">Attempts Pending</th>
                        <th scope="col">Exam Duration</th>
                        <th scope="col">Exam Start Date & Time</th>
                        <th scope="col">Exam End Date & Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        @if ($exam->attemptsRemaining > 0)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $exam->class }}</td>
                                <td>{{ $exam->subject }}</td>
                                <td>{{ $exam->topic }}</td>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->description }}</td>
                                <td>{{ $exam->attemptsRemaining }}</td>
                                <td>{{ $exam->test_duration }} min</td>
                                <td>{{ $exam->test_start_date }}</td>
                                <td>{{ $exam->test_end_date }}</td>
                                <td><a href="{{ url('student/taketest') }}/{{ $exam->id }}"
                                        class="badge badge-success">Start Test</a></td>
                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>

            <br><br>
            <div id="listHeader">
                <h3 class="mb-3">Previous Exams</h3>
            </div>

            <table class="table table-bordered table-responsive">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Exam Description</th>
                        <th scope="col">Exam Duration</th>
                        <th scope="col">Exam Start Date & Time</th>
                        <th scope="col">Exam End Date & Time</th>
                        <th scope="col">Attempted On</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extakens as $extaken)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $extaken->exam_name }}</td>
                            <td>{{ $extaken->exam_description }}</td>
                            <td>{{ $extaken->duration }} min</td>
                            <td>{{ $extaken->test_start_date }}</td>
                            <td>{{ $extaken->test_end_date }}</td>
                            <td>{{ $extaken->test_attempted_on }}</td>
                            <td><a href="{{url('student/exam/report')}}/{{$extaken->id}}" class="badge badge-primary"> Report</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <!-- content-wrapper ends -->
    @endsection
