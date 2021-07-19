@extends('layout.master')
@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">

                        <form action="/users/{{$user->id}}" method="post" class="col-md-12">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <h1>EDIT USER</h1>
                                <label>name :</label>
                                <input type="text" name="name" class="form-control" placeholder="name"
                                       value="{{$user->name}}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label>email :</label>
                                <input type="text" name="email" class="form-control" placeholder="email"
                                       value="{{$user->email}}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label>mobile :</label>
                                <input type="text" name="mobile" class="form-control" placeholder="mobile"
                                       value="{{$user->mobile}}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="col-md-6">
                                    @foreach($role as $rl)
                                        <option value="{{$user->role_id}}"
                                                @if($user->role_id == $rl->id)
                                                    selected
                                                @endif
                                        > {{$rl->title}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div>
                                <button class="btn" type="submit">Send Message</button>
                            </div>
                        </form>
                        @include('layout.errors')

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus.
                        </p>
                        <h4><i class="fa fa-map-marker"></i>123 News Street, NY, USA</h4>
                        <h4><i class="fa fa-envelope"></i>info@example.com</h4>
                        <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
