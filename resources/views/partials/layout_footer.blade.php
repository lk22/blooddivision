@if(url('/'))
    <div id="footer" class="container-fluid blooddivision-footer-wrapper">
        <div class="container inner-footer-wrapper">
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2">
                   <h4>Pages</h4>
                   <ul>
                       <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                       <li><a href="{{url('/members')}}">Members</a></li>
                       <li><a href="{{url('/features')}}">Features</a></li>
                       <li><a href="{{url('/about')}}">About</a></li>
                   </ul>
               </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
                   <h4>Information</h4>
                   <ul>
                       <li><a href="{{url('/helpcenter')}}">Help & FAQ</a></li>
                       <li><a href="{{url('/blog')}}">Blog & News</a></li>
                       <li><a href="{{url('/contact-us')}}">Contact</a></li>
                       <li><a href="https://www.facebook.com/groups/1545118995710570/">Facebook</a></li>
                       <li><a href="https://www.halowaypoint.com/en-us/spartan-companies/blood%20division">Halo Waypoint</a></li>
                   </ul>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
                   <h4>Recruits</h4>
                   <ul>
                       <li><a href="{{url('/join')}}">Join Us</a></li>
                       <li><a href="{{url('/login')}}">Login</a></li>
                       <li><a href="{{url('/register')}}">Register</a></li>
                   </ul>
               </div> 
           </div>
        </div>
    </div>
    <!-- <div class="container-fluid address-bar" id="address">
        <div class="row">
            <span class="comapny">Blooddivision</span>
            <span class="email"><a mailto="">info@blooddivision.com</a></span>

        </div>
    </div> -->
@endif