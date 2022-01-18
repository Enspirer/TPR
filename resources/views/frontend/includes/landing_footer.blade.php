<!--footer-->
<section class="container-fluid pt-5 pb-3 text-white landing-footer" id="footer" style="background-color: #1B1B3A; margin-top:7rem;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 mb-5 mb-md-0">
                <a href="{{ route('frontend.landing') }}">
                    <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid mb-4" alt="" style="height: 4rem;">
                    <!-- <div id="google_translate_element"></div> -->
                </a>
            </div>
            <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                <h5 class="fw-bolder mt-md-2">PAGES</h5>
                <a href="{{ route('frontend.about-us') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">About Us</a>
                <a href="{{ route('frontend.landing_contact') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Contact Us</a>
                <!-- <a href="{{ route('frontend.mobile-apps') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Mobile Apps</a> -->
            </div>
            <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                <h5 class="fw-bolder mt-md-2">MORE</h5>
                <a href="{{ route('frontend.privacy-policy') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Privacy Policy</a>
                <a href="{{ route('frontend.cookie-policy') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Cookie Policy</a>
                <a href="{{ route('frontend.terms-of-use') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Terms of Use</a>
                <a href="{{route('frontend.user_help')}}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Help</a>
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
                    <p class="text-white mb-0">	&copy; All Rights Reserved</p>
                </div>
                <div class="col-6 text-end">
                    <p class="text-white mb-0">Powered by <a href="https://www.enspirer.com" class="text-white text-decoration-none">Enspirer</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>