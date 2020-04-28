@extends('frontend/layouts')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('getPage')}}">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">

    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.9701160160334!2d109.31081371427513!3d13.10107971556985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316fec4478f3ea31%3A0x20708cc425d9748e!2zNjQgTmd1ecOqzINuIENoacyBIFRoYW5oLCBQaMaw4budbmc3LCBUdXkgSMOyYSwgUGjDuiBZw6puLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1586265118745!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            {{-- <div class="col-sm-8">
                <h2>Contact Form</h2>
                <div class="space20">&nbsp;</div>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani m id est laborum.</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Your Name (required)">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Your Email (required)">
                    </div>
                    <div class="form-block">
                        <input name="your-subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Your Message"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div> --}}
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
            <div class="space20">&nbsp;</div>
            <h6 class="contact-title">Địa chỉ</h6>
            <p>P7 - TP.Tuy Hòa - Phú Yên</p>
            <div class="space20">&nbsp;</div>
            <h6 class="contact-title">Điện thoại</h6>
            <p>0966743057</p>
            <div class="space20">&nbsp;</div>
            <h6 class="contact-title">Email</h6>
            <p>PYU@gmail.com</p>
            <div class="space20">&nbsp;</div>
            <h6 class="contact-title">Tài khoản ngân hàng</h6>
            <p>Chủ tài khoản: PYU</p>
            <p>Số tài khoản: 0451001874264</p>
            <div class="space20">&nbsp;</div>
            <p><strong>Để phục vụ khách hàng tốt hơn và chuyên nghiệp hơn, Phú Yên Specialties mong muốn nhận được đề xuất về các dịch vụ bán hàng và hậu mãi từ khách hàng,...</strong></p>
            <p><strong>Cảm ơn.</strong></p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@stop
