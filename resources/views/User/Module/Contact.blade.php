@extends('layout.user')

@section('content')
<div class="cotact-container">
    <h2>Contact Us</h2>
    <p>We'd love to here from you! Reach us through any of the following:</p>

    <div class="contect-methods">
        <!--phone-->
    <div class="contact-item">
        <i class="fa fa-phone"></i>
        <a href="tel:+94701203456"><i class="bi bi-phone"></i> +94711204596</a>
    </div>

    <!--whatsapp-->
    <div class="contact-item">
        <i class="fa fa-whatsapp"></i>
        <a href="https://wa.me/+94711204596" target="_blank"><i class="bi bi-whatsapp"></i> Chat on WhatsApp</a>
    </div>

    <!--facebook-->
    <div class="contact-item">
        <i class="fa fa-whatsapp"></i>
        <a href="https://facebook.com/Addclathing" target="_blank"><i class="bi bi-facebook"></i> Facebook Page</a>
    </div>

    <!--emai-->
    <div class="contact-item">
        <i class="fa fa-envelope"></i>
        <a href="mailto:addclothing@gmail.com"><i class="bi bi-envelope"></i> addclothing@gmail.com</a>
    </div>
</div>
@endsection
