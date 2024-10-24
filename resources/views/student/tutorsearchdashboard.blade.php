@foreach ($tutorlists as $tutorlist)


                        <div id="slide-1">
                            <div class="tutorcard">
                                <div class="tutorcardImg">
                                    <div class="ratePerHr">
                                        <p>&#163;{{$tutorlist->rate}}</p>
                                    </div>
                                    <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}"
                                        class="card-img-top" alt="...">
                                </div>
                                <div class="tutorDesc">
                                    <span class="tutname">{{ $tutorlist->name }}</span><br>
                                    <table class="tutorTable">
                                        <tr>
                                            <td colspan="2"><small>{{ $tutorlist->headline }}</small></td>
                                        </tr>
                                        <tr>
                                            <td>{{$tutorlist->total_classes_done}}+ Lessions</td>
                                            <td class="floattright"><b>Exp:</b> {{$tutorlist->experience}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Subject:</b> {{ $tutorlist->subject }} </td>
                                            <td class="text-success floattright">Verified</td>
                                        </tr>

                                    </table>

                                    <div class="btnSec">
                                        <a href="tutorprofile/{{ $tutorlist->sub_map_id }}"><button
                                                class="btn btn-sm">View Profile</button></a>
                                        <a href="/student/searchtutor"> <button class="btn btn-sm">Free
                                                Trial</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach