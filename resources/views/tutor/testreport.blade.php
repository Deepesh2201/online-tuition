@extends('tutor.layouts.main')
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

        <div class="page-content">
            <div class="container-fluid">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div id="" class="mb-3 text-center page-title-box">
                    <h3>Test Report({{ $onlineTest->name }}) </h3>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <p><b>Total Question:</b>&nbsp;<span>{{ $questionsCount }}</span></p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Total Attempted:</b>&nbsp;<span>{{ $responsesCount }}</span></p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Total Correct:</b>&nbsp;<span>{{ $correctResponsesCount }}</span></p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Total Incorrect:</b>&nbsp;<span>{{ $responsesCount - $correctResponsesCount }}</span></p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Marks Obtained:</b>&nbsp;<span>{{$correctResponsesCount }}</span></p>
                    </div>
                </div>
                <hr>




                <div class="row">

                    @foreach ($mergedData as $index => $questiondata)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-3">
                            <h5 style="display:flex"><span>{{ $index + 1 }}.</span> {!! $questiondata['question'] !!} </h5>
                            <ol type="a">
                                @foreach (range(1, 4) as $optionNumber)
                                    @php
                                        $optionClass = '';
                                        $icon = '';
                                        $label = '';

                                        // Check if the option is marked
                                        if ($questiondata['marked_answer'] == $optionNumber) {
                                            $optionClass = 'text-danger';
                                            $icon = '<i class="fa fa-times-circle"></i>';
                                            $label = 'Marked Incorrect';
                                        }

                                        // Check if the option is correct and marked
                                        if ($questiondata['marked_answer'] == $questiondata['correct_answer'] && $questiondata['marked_answer'] == $optionNumber) {
                                            $optionClass = 'text-success';
                                            $icon = '<i class="fa fa-check-circle"></i>';
                                            $label = 'Marked Correct';
                                        }
                                    @endphp
                                    <li class="{{ $optionClass }}">
                                        {!! $questiondata["option{$optionNumber}"] !!}
                                        @if ($icon)
                                            <span style="margin-left: 20px">{!! $icon !!}
                                                {{ $label }}</span>
                                        @endif
                                    </li>
                                @endforeach

                            </ol>
                            <span class="text-success">
                                <b>Correct Answer:</b> {!! $questiondata["option{$questiondata['correct_answer']}"] !!}

                            </span>
                        </div>
                        <hr>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection
