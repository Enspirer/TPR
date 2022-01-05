<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <!-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js" integrity="sha512-4p9OjnfBk18Aavg91853yEZCA7ywJYcZpFt+YB+p+gLNPFIAlt2zMBGzTxREYh+sHFsttK0CTYephWaY7I3Wbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>

    @stack('before-styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/styles.css')}}"></link>
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/index.css')}}"></link>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{url('tpr_templete/stylesheets/bootstrap-combobox.css')}}" rel="stylesheet">
    <link href="{{url('tpr_templete/stylesheets/rebon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    @stack('after-styles')

    <title>Tropical - Home</title>

    <style>      

      

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        /* background: #fff; */

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 230px;
        object-fit: cover;
      }

      #app {
          position: relative;
      }

      .feedback {
        position: fixed;
        top: 290px;
        right: 0px;
        width: max-content;
        margin-left: auto;
        display: block;
        margin-right: 0px;
        z-index: 100;
        background: red;
        padding: 10px;
        color: #fff;
        border-radius: 15px;
        transform: rotate(
    -90deg);
        border: 0;
        }

        .feedback:hover {
            cursor: pointer;
            background-color: #000;
        }

        label {
            font-size: 16px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

    .selection-box {
        display: none;
    }

    .radio-btns {
        display: block !important;
    }

    .radio-label {
        color: #000 !important;
        font-size: 0.8rem;
    }

    .radio-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom:15px;
    }

    .popup-submit {
        display: block !important;
        margin-top: 15px;
    }

    .feedbackModel h2 {
        font-size: 1.5rem;
    }

    .feedbackModel h3 {
        font-size: 1.25rem;
    }

    .star-label {
        font-size: 30px;
    }

    .pop-content-wrapper {
        text-align: left;
        margin-bottom: 30px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .full-area {
        width: 100%;
        outline: 0;
    }

    .feedbackModel {
        position: relative;
    }

    .close-feedback {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .close-icon {
        background-color: red !important;
        font-size: 0.8rem;
        padding: 8px 10px !important;
        border-radius: 50% !important;
    }

    button.close-feedback {
        background: transparent;
        border: 0;
        width: 50px;
        height: 50px;
    }

    /*google translator*/
    select.goog-te-combo {

font-size: 16px;
background: #4195e1;
border-color: #4195e1;
color: white;
position: absolute;
top: 8px;
right: 60px;
font-weight: 500;

}

.goog-te-gadget .goog-te-combo {
outline:0;
}


.lang-wrapper {
width: 200px;
display: block;
}

#google_translate_element {
color: transparent;
}


/*language modal*/
#langModal .modal-dialog {
  width: 500px;
}

.post-ad-btn {
color: #fff;
text-decoration: none;
font-weight: bold;
background: red;
padding: 5px 15px;
border-radius: 5px;
margin-left: 30px;
margin-right: 30px;
border: 0;
}


.post-ad-btn:hover {
color: #000;
}

.icon-wrapper i {
font-size: 2rem;
background: unset;
padding: 0;
}

/*navigation fix*/
/* li.nav-item.nav1 {
    opacity: 1;
} */


    </style>

</head>
<body onload="initialize()">

@include('includes.partials.read-only')

    <div id="app">
        <button class="feedback" data-toggle="modal" data-target="#feedbackModal"><i class="far fa-comment-dots" style="padding-right:5px;"></i>Feeedback</button>
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        <div class="">
            @include('includes.partials.messages')
            @include('frontend.includes.nav')
            @yield('content')
        </div><!-- container -->
    </div><!-- #app -->

    

    <!--footer-->
    <section class="container-fluid pt-5 pb-3 text-white" id="footer" style="background-color: #1B1B3A;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid mb-4" alt="" style="height: 4rem;">
                    
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">PAGES</h5>
                    <a href="{{ route('frontend.about-us') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">About Us</a>
                    @if(isset(get_country_cookie(request())->country_id))
                        <a href="{{ route('frontend.contact', get_country_cookie(request())->country_id) }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Contact Us</a>
                    @endif
                    <!-- <a href="{{ route('frontend.mobile-apps') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Mobile Apps</a> -->
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">MORE</h5>
                    <a href="{{ route('frontend.privacy-policy') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Privacy Policy</a>
                    <a href="{{ route('frontend.cookie-policy') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Cookie Policy</a>
                    <a href="{{ route('frontend.terms-of-use') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Terms of Use</a>
                    <!-- <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">FAQ</a>
                    <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">Sitemap</a> -->
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">TOPICS</h5>
                    <a href="{{ route('frontend.tips-for-buyers') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Tips for buyers</a>
                    <a href="{{ route('frontend.tips-for-sellers') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Tips for sellers</a>
                    <!-- <a href="{{ route('frontend.commercial-resources') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Commercial Resources</a> -->

                    <a href="#"><img src="{{ asset('tpr_templete/images/fb.svg') }}" alt="" class="img-fluid me-2 ps-3 ps-md-0" style="height:1.4rem;"></a>
                    <a href="#"><img src="{{ asset('tpr_templete/images/instagram.svg') }}" alt="" class="img-fluid me-2" style="height:1.4rem;"></a>
                    
                </div>
            </div>
        </div>
    </section>


    <!--copyright-->
    <div id="copyright">
        <div class="container-fluid" style="background-color: #E293AC;">
            <div class="container">
                <div class="row py-3 align-items-center">
                    <div class="col-6">
                        <p class="text-white mb-0">&copy; All Rights Reserved</p>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-white mb-0">Powered by <a href="https://www.enspirer.com" class="text-white text-decoration-none">Enspirer</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feedback popup -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body feedbackModel" style="text-align:center;">
      <button type="button" class="close-feedback" data-dismiss="modal"><i class="fas fa-times close-icon"></i></button>
            <img style="width:200px;display:block;margin-left:auto;margin-right:auto;margin-bottom:30px;" src="{{ url('tpr_templete/images/tropical_logo.svg') }}" alt="">
            <h2>TPR Visitor Feedback</h2>
            <h3>Please rate your experience on TPR today.</h3>
            
                <div class="pop-content-wrapper">
                    <p style="margin-top:30px;">What is your feedback regarding?</p>
                    <div class="form-group">
                        <select name="cars" id="feedbackSelectList" class="full-area form-control" onchange="feedbackSelection()">
                            <option value="choose" selected="selected" disabled>Choose a topic</option>
                            <option id="user-experience-option" value="UE">User Experience</option>
                            <option id="suggesion-option" value="suggestion">Suggestion</option>
                            <option value="report">Report a technical problem</option>
                            <option value="general">General Inquiries</option>
                        </select> 
                    </div>
                    

                    <!-- user experience -->
                    <div id="user-experience-box" class="selection-box">
                        <form action="{{route('frontend.user_experience.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="star mt-3">
                                    <div class="star-bar"> 
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="1 Star" id="aze">
                                            </label>
                                        
                                        <label class="star-label"> 
                                            ★ 
                                            <input type="radio" name="note" value="2 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="3 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="4 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="5 Stars">
                                        </label>

                                    </div>
                                </div>

                                <p style="margin-top:10px;">Click here to type your comment question</p>                               

                                <textarea style="margin-bottom:30px;" class="full-area form-control" name="comment_question" rows="4"></textarea>

                                <p style="margin-bottom:5px;">Are you a First Time Buyer/Seller?</p>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="yes" name="buyer_seller" value="yes">
                                    <label class="radio-label form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="no" name="buyer_seller" value="no">
                                    <label class="radio-label form-check-label" for="no">No</label>
                                </div>
                                <p style="margin-top:15px;">What stage in the property buying journey are you in?</p>
                                <div class="form-group">
                                    <select name="stage_property" id="stage_property" class="full-area form-control">
                                        <option value="" selected="selected" disabled>Choose..</option>
                                        <option value="Just Borrowing">Just Borrowing</option>
                                        <option value="Getting Started">Getting Started</option>
                                        <option value="Seriously Hunting">Seriously Hunting</option>
                                        <option value="Recently Purchased">Recently Purchased</option>
                                    </select>
                                </div>
                               
                                <input type="hidden" class="form-control" name="topic" value="User Experience">
                                <input class="popup-submit btn btn-primary" type="submit" value="submit">
                        </form>
                        
                        
                    </div>
                    <div id="suggestions-box" class="selection-box">
                        <form action="{{route('frontend.suggestion.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="star mt-3">
                                    <div class="star-bar"> 
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="1 Star" id="aze">
                                            </label>
                                        
                                        <label class="star-label"> 
                                            ★ 
                                            <input type="radio" name="note" value="2 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="3 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="4 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="5 Stars">
                                        </label>

                                    </div>
                                </div>

                                <p style="margin-top:10px;">Please share your suggestion with us.</p>

                                <textarea style="margin-bottom:30px;" name="suggestion" class="full-area form-control" rows="4"></textarea>
                                
                                <p style="margin-bottom:5px;">Are you a First Time Buyer/Seller?</p>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="yes" name="buyer_seller" value="yes">
                                    <label class="radio-label form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="no" name="buyer_seller" value="no">
                                    <label class="radio-label form-check-label" for="no">No</label>
                                </div>
                                <p style="margin-top:15px;">What stage in the property buying journey are you in?</p>
                                <div class="form-group">
                                    <select name="stage_property" id="stage_property" class="full-area form-control">
                                        <option value="" selected="selected" disabled>Choose..</option>
                                        <option value="Just Borrowing">Just Borrowing</option>
                                        <option value="Getting Started">Getting Started</option>
                                        <option value="Seriously Hunting">Seriously Hunting</option>
                                        <option value="Recently Purchased">Recently Purchased</option>
                                    </select>
                                </div>
                                
                                <input type="hidden" class="form-control" name="topic" value="Suggestion">
                                <input class="popup-submit btn btn-primary" type="submit" value="submit">
                        </form>
                    </div>



                        
                    <div id="report-box" class="selection-box">   
                        <form action="{{route('frontend.technical_problem.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}

                                <div class="star mt-3">
                                    <div class="star-bar"> 
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="1 Star" id="aze">
                                            </label>
                                        
                                        <label class="star-label"> 
                                            ★ 
                                            <input type="radio" name="note" value="2 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="3 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="4 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="5 Stars">
                                        </label>

                                    </div>
                                </div>

                            <p style="margin-top:10px;">What issues are you having?</p>
                            <div class="form-group">
                                <select name="issues" id="issues" class="full-area form-control">
                                    <option value="" selected="selected" disabled>Choose..</option>
                                    <option value="Searching for Properties">Searching for Properties</option>
                                    <option value="Viewing Properties">Viewing Properties</option>
                                    <option value="Contacting a TPR">Contacting a TPR</option>
                                    <option value="Website Performance">Website Performance</option>
                                    <option value="TPR Account">TPR Account</option>
                                </select>
                            </div>
                          
                            <p style="margin-top:15px;">Please provide details and your email address if you would like a response</p>
                                <textarea class="full-area" rows="4"></textarea>    
                                <p style="margin-bottom:5px;">Are you a First Time Buyer/Seller?</p>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="yes" name="buyer_seller" value="yes">
                                    <label class="radio-label form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="no" name="buyer_seller" value="no">
                                    <label class="radio-label form-check-label" for="no">No</label>
                                </div>
                                <p style="margin-top:15px;">What stage in the property buying journey are you in?</p>
                                <div class="form-group">
                                    <select name="stage_property" id="stage_property" class="full-area form-control">
                                        <option value="" selected="selected" disabled>Choose..</option>
                                        <option value="Just Borrowing">Just Borrowing</option>
                                        <option value="Getting Started">Getting Started</option>
                                        <option value="Seriously Hunting">Seriously Hunting</option>
                                        <option value="Recently Purchased">Recently Purchased</option>
                                    </select>
                                </div>

                                <input type="hidden" class="form-control" name="topic" value="Technical Problem">
                                <input class="popup-submit btn btn-primary" type="submit" value="submit">
                        </form>
                    </div>
                    <div id="general-box" class="selection-box">
                        <form action="{{route('frontend.general_problems.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}

                                <div class="star mt-3">
                                    <div class="star-bar"> 
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="1 Star" id="aze">
                                            </label>
                                        
                                        <label class="star-label"> 
                                            ★ 
                                            <input type="radio" name="note" value="2 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="3 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="4 Stars">
                                            </label>
                                        <label class="star-label">
                                            ★
                                            <input type="radio" name="note" value="5 Stars">
                                        </label>

                                    </div>
                                </div>

                                <p style="margin-top:10px;">Click here to type your comment question</p>

                                <textarea class="full-area form-control mb-3" name="comment_question" rows="4"></textarea>

                                <p style="margin-bottom:5px;">Are you a First Time Buyer/Seller?</p>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="yes" name="buyer_seller" value="yes">
                                    <label class="radio-label form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="radio-wrapper form-check">
                                    <input class="radio-btns form-check-input" type="radio" id="no" name="buyer_seller" value="no">
                                    <label class="radio-label form-check-label" for="no">No</label>
                                </div>
                                <p style="margin-top:15px;">What stage in the property buying journey are you in?</p>
                                <div class="form-group">
                                    <select name="stage_property" id="stage_property" class="full-area form-control">
                                        <option value="" selected="selected" disabled>Choose..</option>
                                        <option value="Just Borrowing">Just Borrowing</option>
                                        <option value="Getting Started">Getting Started</option>
                                        <option value="Seriously Hunting">Seriously Hunting</option>
                                        <option value="Recently Purchased">Recently Purchased</option>
                                    </select>
                                </div>
                              
                                <input type="hidden" class="form-control" name="topic" value="Inquiries">
                                <input class="popup-submit btn btn-primary" type="submit" value="submit">
                        </form>
                    </div>

                </div>


      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- ad popup -->
<div class="modal fade" id="adModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-body" style="position:relative;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:-10px;top:-10px;background:red;border:0;border-radius:50%;width:25px;">
          <span aria-hidden="true" style="color:#fff;">&times;</span>
        </button>
        <h2>Place your ad</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- lang popup -->
<div class="modal fade" id="langModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-body" style="position:relative;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:-10px;top:-10px;background:red;border:0;border-radius:50%;width:25px;">
          <span aria-hidden="true" style="color:#fff;">&times;</span>
        </button>
        <div id="google_translate_element"></div>
      </div>
    </div>
  </div>
</div>



    @if(\Session::has('feedback_success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="feedback_modal" data-toggle="modal" data-target="#voteModal"></button>

        <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem;">
                        <h4 class="text-center">Feedback Submitted Successfully!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





    @endif



@stack('dialog_modal')

<!-- Scripts -->


@stack('before-scripts')

<script src="{{ asset('tpr_templete/scripts/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

<script>
    if(document.getElementById("feedback_modal")){
        $('#feedback_modal').click();
    }
</script>

<script>
    AOS.init();
</script>
<script src="{{ asset('tpr_templete/scripts/bootstrap-combobox.js') }}"></script>


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


@stack('after-scripts')
<!-- feedback form  -->
<script>
    function feedbackSelection(){
       
       var feedbackSelectOne =  document.getElementById("feedbackSelectList").options[document.getElementById("feedbackSelectList").selectedIndex].value;

       if(feedbackSelectOne == "UE") {
           document.getElementById("user-experience-box").style.display = "block";
           document.getElementById("suggestions-box").style.display = "none";
           document.getElementById("report-box").style.display = "none";
           document.getElementById("general-box").style.display = "none";
       } 
       else if (feedbackSelectOne == "suggestion") {
        document.getElementById("user-experience-box").style.display = "none";
        document.getElementById("suggestions-box").style.display = "block";
        document.getElementById("report-box").style.display = "none";
        document.getElementById("general-box").style.display = "none";
       } 
       else if (feedbackSelectOne == "report") {
        document.getElementById("user-experience-box").style.display = "none";
        document.getElementById("suggestions-box").style.display = "none";
        document.getElementById("report-box").style.display = "block";
        document.getElementById("general-box").style.display = "none";
       } 
       else if (feedbackSelectOne == "general") {
        document.getElementById("user-experience-box").style.display = "none";
        document.getElementById("suggestions-box").style.display = "none";
        document.getElementById("report-box").style.display = "none";
        document.getElementById("general-box").style.display = "block";
       } 
       else if (feedbackSelectOne == "choose") {
        document.getElementById("user-experience-box").style.display = "none";
        document.getElementById("suggestions-box").style.display = "none";
        document.getElementById("report-box").style.display = "none";
        document.getElementById("general-box").style.display = "none";
       } 

    }
</script>


<!-- five star -->
<script>
    const LABELCOLORINACTIV = "#B1A7A7";
const LABELCOLORACTIV = "#e7f046";

const RATINGSLABELS = document.querySelectorAll("div.star label");
const RATINGSINPUTS = document.querySelectorAll("div.star input");

// make inputs disappear
RATINGSINPUTS.forEach(function(anInput) {
  anInput.style.display = "none";
});

// manage label click & hover display
function notationLabels(e) {
  let currentLabelRed = e.target;
  let currentLabelBlack = e.target;
  
  // console.log(e.target.localName);
  
  if (e.type == "mouseenter" || !e.target.control.checked) {
    // coloring red from the clicked/hovered label included, going backward till the node start - if we are hovering or the star isn't already checked.
    while (currentLabelRed != null) {
      currentLabelRed.style.color = LABELCOLORACTIV;
      currentLabelRed = currentLabelRed.previousElementSibling;
    }

    // coloring black from the clicked/hovered label excluded, going forward till the node end
    while ((currentLabelBlack = currentLabelBlack.nextElementSibling) != null) {
      currentLabelBlack.style.color = LABELCOLORINACTIV;
    }
  } else {
    // if the clicked label was already checked we uncheck it and prevent the click event from doing its job - defacto enabling zero star rating
    e.target.control.checked = false;
    e.preventDefault();
  }
  
}

function notationLabelsOut(e) {
  let notesNode = e.target.parentNode.querySelectorAll("label");
  let currentLabel = notesNode[notesNode.length - 1];
  
  // console.log("out : " + e.target.localName);
  // console.log("out checked: " + e.target.control.checked);
  
  notesNode.forEach(function redrum(starLabel) {
    starLabel.style.color = LABELCOLORACTIV;
  });

  while (currentLabel != null && !currentLabel.control.checked) {
    currentLabel.style.color = LABELCOLORINACTIV;
    currentLabel = currentLabel.previousElementSibling;
    
    //console.log("currentLabel null?: " + currentLabel);
    // previousElementSibling become the input ...
  }
}

document.addEventListener("DOMContentLoaded", function() {
  RATINGSLABELS.forEach(function(aStar) {
    aStar.style.color="#eee";
    aStar.addEventListener("click", notationLabels);
    aStar.addEventListener("mouseenter", notationLabels);
    aStar.addEventListener("mouseout", notationLabelsOut);
  });

  // stop a callback to the label click event function notationLabels passed on the input element associated ... why ... that's behond me
  // alternatively we could check for e.target.localName in the notationLabels function
  RATINGSINPUTS.forEach(function(aStarInput) {
    aStarInput.addEventListener("click", function(e) {
    e.stopPropagation();
    });
  });
});

</script>

<!-- places API -->
<script>
    /*form autofilling scripts*/
var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};


function initialize() {

  
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */
        (document.getElementById('autocomplete')), {
            types: ['geocode']
        });
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */
        (document.getElementById('autocompletetwo')), {
            types: ['geocode']
        });
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */
        (document.getElementById('autocompleteFilter')), {
            types: ['geocode']
        });
        
    // When the user selects an address from the dropdown,
    // populate the address fields in the form.
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
    });
}

// [START region_fillform]
function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();



    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }




    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
    
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(
                position.coords.latitude, position.coords.longitude);
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());

            // var placeLat = position.coords.latitude;
            // var placeLng = position.coords.longitude;
            // console.log("Lat:-" + placeLat);
            // console.log("Lng:-" + placeLng);

        });
    }
}
// [END region_geolocation]

/*end of form autofilling scripts*/
</script>

</body>
</html>
