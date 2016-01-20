@if(url('/'))
    <div class="container-fluid blooddivision-footer-wrapper">
        <div class="container inner-footer-wrapper">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inner-wrapper">
                <div class="col-xs- col-sm- col-md-3 col-md-offset-2 col-lg-3 col-lg-offset-2">
                    <address class="company-information-wrapper">
                        <strong>Blood Division</strong><br>
                        <a href="mailto:#">info@blooddivision.com</a>
                        <p>&reg; All rights reserved</p>
                    </address>
                </div>
                <div class="col-xs- col-sm- col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1">
                    <div class="footer-link-wrapper">
                    @if(Auth::guest())
                        <span class="link"><a href="{{ url('/login') }}">Login <i class="fa fa-user"></i></a></span>
                        <span class="link"><a href="{{ url('/register') }}">Register <i class="fa fa-user-plus"></i></a></span>
                        <span class="link"><a href="{{ url('/terms') }}">Terms and conditions <i class="fa fa-certificate"></i></a>
                        </span>
                        <span class="link"><a href="{{ url('/help') }}">Help <i class="fa fa-question-circle"></i></a></span>
                    @else
                        <span class="link"><a href="{{ url('/terms') }}">Terms and conditions <i class="fa fa-certificate"></i></a>
                        </span>
                        <span class="link"><a href="{{ url('/help') }}">Help <i class="fa fa-question-circle"></i></a></span>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif