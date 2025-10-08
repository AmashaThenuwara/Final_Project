@extends('layout.user')

@section('content')
    <section class="hero">
        <div class="hero-text">
            <h1>Welcome to ADDCLOTHING</h1>
            <p>Trendy clothes for ladies,Gents,Kids</p>
        </div>
    </section>

    <!--Featured Product-->
    <section class="featured">
    <h2>Featured Products</h2>

    {{-- Ladies --}}
    <div class="category-block">
        <h3>Ladies Trouser</h3>
        <div class="scroll-horizontal">
            <img src="{{ asset('Images/LL3.png') }}" alt="Ladies Trouser">
            <img src="{{ asset('Images/LL5.png') }}" alt="Ladies Trouser">
            <img src="{{ asset('Images/LL6.png') }}" alt="Ladies Trouser">
            <img src="{{ asset('Images/LL7.png') }}" alt="Ladies Trouser">
            <img src="{{ asset('Images/LL8.png') }}" alt="Ladies Trouser">
            <img src="{{ asset('Images/LL4.png') }}" alt="Ladies Trouser">
        </div>
    </div>

    {{-- Kids --}}
    <div class="category-block">
        <h3>Kids Short</h3>
        <div class="scroll-horizontal">
            <img src="{{ asset('Images/KS1.png') }}" alt="Kids Short">
            <img src="{{ asset('Images/KS2.png') }}" alt="Kids Short">
            <img src="{{ asset('Images/KS3.jpg') }}" alt="Kids Short">
        </div>
    </div>

    {{-- Gents --}}
    <div class="category-block">
        <h3>Gents Short</h3>
        <div class="scroll-horizontal">
            <img src="{{ asset('Images/GL1.jpg') }}" alt="Gents Short">
            <img src="{{ asset('Images/GL2.jpg') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS1.jpg') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS2.jpg') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS3.png') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS5.png') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS6.png') }}" alt="Gents Short">
            <img src="{{ asset('Images/GS4.png') }}" alt="Gents Short">
            <img src="{{ asset('Images/GL3.png') }}" alt="Gents Short">
            <img src="{{ asset('Images/GL4.png') }}" alt="Gents Short">
        </div>
    </div>
</section>

@endsection
