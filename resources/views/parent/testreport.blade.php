@extends('student.layouts.main')
@section('main-section')
<!-- ============================================================== -->
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
            <style>
            .bordereddiv {
                border: 1px solid lightgray;
                border-radius: 5px;
                padding: 15px;
            }

            .ansSec {
                border: 1px solid darkgray;
                padding: 20px;
            }

            .optionDiv {
                border-bottom: 1px solid lightgray;
            }

            .reportcard {
                display: flex;
                justify-content: center;
            }
            </style>


            <div class="reportcard">
                <div class="card " style="width: 38rem;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Result : {{$onlineTest->name}}</h5>
                        <p style="font-size:16px" class="card-subtitle mt-2 mb-2 text-muted"><b>Name: Deepesh</b></p>
                        <hr>


                        <div class="row ">

                            <div class="col-12 col-md-12 col-sm-12">
                                <p><b>Total Questions :</b> {{$questionsCount}}</p>
                                <p class="text-success"><b> Attempted :</b> {{$responsesCount}}</p>
                                <p class="text-danger"><b> Non-Attempted :</b> {{$questionsCount - $responsesCount}}</p>
                                {{-- <img src="assets/images/icons8-target.gif" width="100" height="100"><br><br> --}}

                            </div>
                            <div class="col-12 col-md-12 col-sm-12">
                                <p class="text-success"><b> Correct :</b> {{$correctResponsesCount}}</p>
                                <p class="text-danger"><b>Incorrect :</b>
                                    {{$responsesCount - $correctResponsesCount}}</p>
                                <p class="text-success " style="font-size:16px"><b>Total Marks Obtained
                                        : </b>{{$correctResponsesCount}}/{{$questionsCount}}</p>
                            </div>

                           
                        </div>



                    </div>
                </div>


            </div>





            {{-- <div class="mt-5" id="answerSheet">
                <hr>
                <h3>Answers</h3>
                @foreach ($onlineTest as $question)
                <div class="ansSec mb-3">
                    <h4>{{ $loop->iteration }} &rpar; {{ $onlineTest->name }}</h4>
            @foreach (['a', 'b', 'c', 'd'] as $optionValue)
            <div class="optionDiv">
                <input name="option" type="radio" id="option{{ $loop->parent->iteration }}{{ $loop->iteration }}"
                    value="{{ $optionValue }}" disabled>
                <label for="option{{ $loop->parent->iteration }}{{ $loop->iteration }}">
                    &nbsp; {{ $question['option' . $optionValue] }}
                    @if ($question->correct_option === $optionValue)
                    (Correct)
                    @endif
                    @if ($question->marked_option === $optionValue)
                    (Marked)
                    @endif
                </label>
            </div>
            @endforeach
        </div>
        @endforeach --}}

        {{-- <div class="ansSec mb-3">
                    <h4>2 &rpar; "What least number must be added to 1056, so that the sum is completely divisible by 23 ?
                    </h4>
                    <div class="optionDiv"><input type="radio"><label>&nbsp; 2</label></div>
                    <div class="optionDiv"><input type="radio"><label>&nbsp; 3</label></div>
                    <div class="optionDiv"><input type="radio"><label>&nbsp; 18</label></div>
                    <div class="optionDiv"><input type="radio"><label>&nbsp; 21</label></div>
                </div>
            {{-- </div> --}}
    </div>
    <!-- content-wrapper ends -->
    @endsection