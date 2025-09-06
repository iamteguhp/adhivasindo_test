@extends('USER.layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
      @import url('https://fonts.googleapis.com/css?family=Righteous');

  h2 {
    font-size: 2.5em;
    margin-bottom: 50px;
  }

  .a i:hover {
    text-decoration: none;
  } */

  /* ---------------------------- *\
  \* --------- WELCOME ---------- */

  .welcome-page {
    padding-top: 200px;
    padding-bottom: 200px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 30% 25%;
    background-image: url("https://docs.google.com/uc?export=download&id=0B3_V506_wrD8SmdtMVRkdVJBdlU");
    /* use without jumbotron
    text-shadow: 0 0 15px #eee; */
  }

  .welcome-page h1 {
    font-size: 2.85em;
    font-family: Righteous, cursive;
    margin: .25em 0;
  }

  .welcome-page h1:after {
    content: "";
    display: block;
    background-color: #222;
    height: 2px;
    width: 200px;
    border-radius: 25%;
    margin: 15px auto;
  }

  .welcome-page p {
    font-size: 1.15em;
    /* use without jumbotron */
    line-height: 1.5em;
  }

  .welcome-page a {
    margin-right: 1.25em;
  }
  .welcome-page a:last-child {
    margin-right: 0;
  }
  p, h1 {
      text-align: center;
      margin: 0 auto;
  }
  #home {
      margin-top: 25% !important;
  }
</style>
@endpush

@section('content')
<div class="main-content">
  <div class="container-fluid welcome-page" id="home">
    <div class="jumbotron">
      <h1>
          {{ Session::get('user')['name'] }}
      </h1>
      <p>
          {{ Session::get('user')['role']['name'] }}
      </p>
      <a href="#" target="_blank">
          <i class="fa fa-2x fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="#" target="_blank">
          <i class="fa fa-2x fa-github" aria-hidden="true"></i>
      </a>
      <a href="#" target="_blank">
          <i class="fa fa-2x fa-twitter" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <!-- start: footer -->
  @include('USER/layouts/footer')
  <!-- end: footer -->

</div>
@endsection

@push('scripts')

@endpush
