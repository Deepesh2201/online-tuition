@extends('admin.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- <h3 class="text-center"></h3> -->
            <div id="listHeader" class="mb-3">
                <h3>Question Bank</h3>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.questionbank.create') }}"> <span
                        class="fa fa-plus"></span> Add New
                    Question</a>
            </div>

            <table class="table table-hover table-bordered table-responsive">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Question</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $question->class }}</td>
                            <td>{{ $question->subject }}</td>
                            <td>{{ $question->topic }}</td>
                            <td>{{ $question->question }}</td>
                            {{-- <td><div ><textarea class="form-control">{{$question->question}}</textarea></div></td> --}}
                            <td>
                                <div class="toggle-button-cover">
                                    <div class="button-cover">
                                        <div class="button r" id="button-3">
                                            <input type="checkbox"
                                                onclick="changestatus('{{ $question->question_id }}','{{ $question->question_status }}');"
                                                class="checkbox" @if ($question->question_status == 1) then checked @endif>
                                            <div class="knobs"></div>
                                            <div class="layer"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center"><a class="badge badge-primary"
                                        href="{{ url('admin/questionupdate') . '/' . $question->question_id }}">View/Update</a>
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

                var url = "{{ URL('admin/question/status') }}";
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
                            window.location = "/admin/questionbank";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }
        </script>
    @endsection
