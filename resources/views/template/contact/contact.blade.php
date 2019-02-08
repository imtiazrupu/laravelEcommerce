@extends('shop.index')

@section('body_content')
    <secton>
        <div class="second-page-container">
            <div class="block-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="container">
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Contact</span> Information </h1>
                    </div>
                    <div class="row">
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                <h3><i class="fa fa-thumb-tack"></i>Our Address</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                    </p>
                                <hr>
                                <h3><i class="fa fa-envelope-o"></i>Send Message</h3>
                                <div id="form-wrapper">
                                    <div id="form-inner">
                                        <form id="MyContactForm" name="MyContactForm" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                                                        <div>
                                                            <input type="text" class="form-control" name="name" id="name">
                                                            <label for="name" id="nameLb"><span class="error">*Name Field Required</span></label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputLastName" class="control-label">Email:<span class="text-error">*</span></label>
                                                        <div>
                                                            <input type="email"  class="form-control" name="email" id="email">
                                                            <label for="email" id="emailLb">
                                                                <span class="error error1">*Email Field Required</span>
                                                                <span class="error error2">*Email Not Valid</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputSubject" class="control-label">Phone:<span class="text-error">*</span></label>
                                                        <div>
                                                            <input type="text" name="phone" class="form-control" id="phone">
                                                            <label for="phone" id="phoneLb"><span class="error">*Telephone Field Required</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputText" class="control-label">Message:<span class="text-error">*</span></label>
                                                        <div>
                                                            <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                                                            <label for="message" id="messageLb"><span class="error">*Message Field Required</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <input type="submit" class="btn-default-1 contact-btn" value="Submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                <h3> <i class="fa fa-adn"></i>Map</h3>
                                <hr>
                                <div class="google-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d335900.93392687745!2d2.3504871190777603!3d48.87296719673322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1394030722365" style="overflow:hidden;height:100%;width:100%;" frameborder="0" ></iframe>
                                </div>

                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </secton>
@endsection
