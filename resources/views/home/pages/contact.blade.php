@extends('home/layout/layout')
@section('title')
    Contact
@endsection
@section('page-title')
    Contact
@endsection
@section('main-content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Contact</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="/home">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="custom-row-2">
    <div class="col-lg-4 col-md-5">
        <div class="contact-info-wrap">
            <div class="single-contact-info">
                <div class="contact-icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="contact-info-dec">
                    <p>+84 123 456 789</p>
                    <p>+84 987 654 321</p>
                </div>
            </div>
            <div class="single-contact-info">
                <div class="contact-icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="contact-info-dec">
                    <p><a href="#">admin@admin.com</a></p>
                    <p><a href="#">thichdanwebsite.com</a></p>
                </div>
            </div>
            <div class="single-contact-info">
                <div class="contact-icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="contact-info-dec">
                    <p>Địa chỉ tại,</p>
                    <p>Yên Mỹ, Hưng Yên.</p>
                </div>
            </div>
            <div class="contact-social">
                <h3>Follow Us</h3>
                <div class="social-info">
                    <ul>
                        <li>
                            <a href="#"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-google"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="contact-form">
            <div class="contact-title mb-30">
                <h2>Get In Touch</h2>
            </div>
            <form class="contact-form-style" id="contact-form" action="assets/php/mail.php" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <input name="name" placeholder="Name*" type="text">
                    </div>
                    <div class="col-lg-6">
                        <input name="email" placeholder="Email*" type="email">
                    </div>
                    <div class="col-lg-12">
                        <input name="subject" placeholder="Subject*" type="text">
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" placeholder="Your Message*"></textarea>
                        <button class="submit" type="submit">SEND</button>
                    </div>
                </div>
            </form>
            <p class="form-messege"></p>
        </div>
    </div>
</div>
@endsection