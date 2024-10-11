@extends('front-cms.layouts.main')
@section('main-section')
<!-- END header -->


<style>
input,
textarea {
    width: calc(100% - 0px);
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #f5f5f5;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

input:focus,
textarea:focus {
    outline: none;
    background-color: #e0e0e0;
}
</style>
<section class="bannerSec tutBann">
    <div class="container-fluid">
        <div class="tutorHeader text-center">
            <h1 class="mb-3">
                Contact Us
            </h1>
            <div class="contactHaeder">
                <p>Are you a tutor with questions about your account or application?</p>
                <p>Are you a parent or student seeking assistance with your bookings?</p>
            </div>



        </div>
    </div>

</section>
<!-- tutor section -->
<section class="mt-5">
    <div class="container contactContainer">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <h1>Need some help?</h1>
                <br>
                <h5><b> Give us a call</b></h5>




                <div class="contactsOuter">

                    <div class="contacts">

                        <div class="contImg">
                            <img src="{{ url('frontendnew/img/icons/contact-phone.png') }}" width="30px" alt="">
                        </div>
                        <div class="contactDetails">
                            <p><b>Speak to the UK-based team.</b></p>
                            <a href="tel:07761975326"><b>07761 975326</b></a>
                        </div>
                    </div>
                </div>
                <div class="contactsOuter">
                   <div class="openingHr">
                    <p><b>Opening Hours for Phone Support</b></p>
                        <div class="">
                            <p>Monday - Thursday: 8am - 7pm</p>
                            <p>Fridays: 8am - 6pm</p>
                        </div>
                   </div>
                </div>
                <div class="contactsOuter">
                <div class="openingHr">
                    <p><b>Live Chat support also available</b></p>
                    <div class="">
                        <p>Saturday & Sunday 9am - 5pm</p>

                    </div>
</div>
                </div>


                <div class="contactsOuter">
                    <div class="contacts">

                        <div class="contImg">
                            <img src="{{ url('frontendnew/img/icons/whatsapp.png') }}" width="30px" alt="">
                        </div>
                        <div class="contactDetails">
                            <p><b>WhatsApp for Tutors Parents & Students</b></p>
                            <a
                                href="https://api.whatsapp.com/send?phone=+447761975326&text=Hello."><b>07761 975326</b></a>
                        </div>
                    </div>
                </div>


                <div class="contactsOuter">
                    <div class="contacts">

                        <div class="contImg">
                            <img src="{{ url('frontendnew/img/icons/envelope.png') }}" width="30px" alt="">
                        </div>
                        <div class="contactDetails">
                            <p><b>Send us a message</b></p>
                            <a href="mailto:mychoicetutor@gmail.com"><b>mychoicetutor@gmail.com</b></a>
                        </div>
                    </div>
                </div>









            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h1>Send us a message</h1>
                <div class="contactform mt-4">
                    <form action="https://api.web3forms.com/submit" method="POST">
                        <input type="hidden" name="access_key" value="4b32d89d-c763-494c-8e4e-2c5556dbbedf">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <div class="contactSubmitBtn">
                                <button type="submit" class="btn brand-bg-Color ">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>












</section>
@endsection