@extends('tutor.layouts.main')
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
            <h3 class="text-center">Completed Classes</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Meeting ID</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liveclasses as $liveclass)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $liveclass->meeting_id }}</td>
                                <td>{{ $liveclass->subjects }}</td>
                                <td>{{ $liveclass->batch }}</td>
                                <td>{{ $liveclass->topics }}</td>
                                <td>{{ $liveclass->start_time }}</td>
                                <td>{{ $liveclass->duration }}</td>
                                <td>{{ $liveclass->status }}</td>
                               
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

    
    @endsection
