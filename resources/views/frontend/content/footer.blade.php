<div class="footer-area-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <a href="/">
                        @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo.png')}}" alt="logo">
                        @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}" alt="logo">
                        @endif
                    </a>
                    <div class="footer-about">
                        <p> {{@$footer->desc}} </p>
                    </div>
                    <ul class="footer-social">
                        <li><a href="{{'https://www.linkedin.com/in'}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.twitter.com/'}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.facebook.com/'}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.instagram.com/'}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <h3>Informasi</h3>
                    <ul class="corporate-address">
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:{{@$footer->telp}}"> {{@$footer->telp}}</a></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{@$footer->email}}</li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-area-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <p>&copy; {{date('Y')}} <a href="https://www.instagram.com/pmr_wira_smkn1kawali/" target="_blank">PMR SMKN 1 KAWALI</a> All Rights Reserved.</p>
            </div>

        </div>
    </div>
</div>
