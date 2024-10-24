@extends('student.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
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
            </style>

            <div class="mb-4 text-center">
                <h3>Result : {{$onlineTest->name}}</h3>
            </div>
            <div class="row bordereddiv">
                <h3 class="w-100  text-center" style="border-bottom: 1px solid rgb(193, 193, 193)">You've scored {{$correctResponsesCount}}/{{$questionsCount}} </h3><br><br>
                <div class="col-6 col-md-6 col-sm-6">
                    <h4>Total Questions     : {{$questionsCount}}</h4>
                    <h4>Total Attempted     : {{$responsesCount}}</h4>
                    <h4>Total Non-Attempted : {{$questionsCount - $responsesCount}}</h4>
                    {{-- <img src="assets/images/icons8-target.gif" width="100" height="100"><br><br> --}}

                </div>
                <div class="col-6 col-md-6 col-sm-6">
                    <h4>Total Correct : {{$correctResponsesCount}}</h4>
                    <h4>Total Incorrect : {{$responsesCount - $correctResponsesCount}}</h4>
                    <h4>Total Marks Obtained : {{$correctResponsesCount}}</h4>
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
                            <input name="option" type="radio" id="option{{ $loop->parent->iteration }}{{ $loop->iteration }}" value="{{ $optionValue }}" disabled>
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
