@extends('layout.common.main')
@section('main-section')

 <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card" style="width: 50rem; margin: 0 auto;">

                                <div class=" card-header bg-white">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="ms-4 d-flex flex-column" style="width: 150px;">
                                                <img src="assets/images/faces/face1.jpg" alt="Generic placeholder image"
                                                    class="img-fluid img-thumbnail mb-2"
                                                    style="width: 150px; z-index: 1; border-radius: 50%;">

                                                <a type="button" class="btn btn-outline-dark bg-primary"
                                                    href="demo.html" style="z-index: 1;">
                                                    Schedule Demo
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-9 text-left">
                                            <h2 style="margin-top: 60px;">Richard</h2>
                                            <p><i>I am an English teacher, with over 10 years of experience.</i> </p>
                                        </div>

                                    </div>

                                </div>



                                <div class="card-body">
                                    <div>
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/6eNn59XvcgU"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>

                                    </div>

                                    <h4 class="mt-3">Personal Details</h4>
                                    <table class="tab table-bordered" width="100%" id="profileTable">
                                        <tr>

                                            <th>Name:</th>
                                            <td>Richard</td>
                                        </tr>
                                        <tr>
                                            <th>Goal:</th>
                                            <td>Lorem ipsum is a placeholder text commonly used to demonstrate the
                                                visual form of a document</td>
                                        </tr>
                                        <tr>
                                            <th>Qualification:</th>
                                            <td>Ph.D</td>
                                        </tr>
                                        <tr>
                                            <th>Experience:</th>
                                            <td>10 Year</td>
                                        </tr>
                                        <tr>
                                            <th>Certifications:</th>
                                            <td><span>IELTS, </span><span>TOEFL, </span><span>PTE Academic</span>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Rate:</th>
                                            <td><span>&#163;</span> 125/ Hr</td>
                                        </tr>

                                        <tr>
                                            <th>Headline:</th>
                                            <td>I am an English teacher, with over 10 years of experience.</td>
                                        </tr>

                                        <tr>
                                            <th>Area:</th>
                                            <td>English </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <h4>Acievements</h4>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <th>details</th>
                                            <th>Date</th>
                                        </tr>
                                        <tr>
                                            <td>Best Teacher Award-2020</td>
                                            <td>I got best teacher award from education council. </td>
                                            <td>26 March 2020</td>
                                        </tr>
                                    </table>

                                    <br>
                                    <h4>Reviews</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Subject</th>
                                            <th>details</th>
                                            <th>Rating</th>
                                        </tr>
                                        <tr>
                                            <td>English</td>
                                            <td>I am a good English Teacher, with over 10 years' experience</td>
                                            <td>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star-half checked"></span>

                                            </td>
                                        </tr>


                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
@endsection