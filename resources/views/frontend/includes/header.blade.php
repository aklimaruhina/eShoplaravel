<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>@yield('title', 'Ecommerce Platform')</title>

<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('owl-carousel/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen" />
<link href="{{ asset('owl-carousel/owl.transitions.css') }}" type="text/css" rel="stylesheet" media="screen" />

<script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jstree.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/template.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global.js') }}" type="text/javascript"></script>
<script src="{{ asset('owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css" >
  <script src="https://shareurcodes.com/js/bootstrap-notify.min.js" ></script>
<style type="text/css">
.float-alert {   display: inline-block;   margin: 0px auto;   position: fixed;  -webkit-transition: all 0.5s ease-in-out;  transition: all 0.5s ease-in-out;  z-index: 1031;   top: 20px;  right: 20px;}
.alert:not(.float-alert) span[data-notify="icon"] {  float: left;   font-size: 18px;  margin-top: 0px;}
.float-alert.alert span[data-notify="icon"] {  font-size: 20px;  display: block;  left: 13px;  position: absolute;   top: 50%;   margin-top: -11px;}
.alert.float-alert .alert-title {  margin-left: 30px;   font-weight: 500;}
[dir="rtl"] .alert.float-alert .alert-title {   float: left;}
.alert:not(.float-alert) .alert-title {  margin-left: 10px;}
.alert.float-alert button.close {  position: absolute;  right: 10px;  top: 50%;  margin-top: -13px;
    z-index: 1033;  background-color: #FFFFFF;  display: block;  border-radius: 50%;   opacity: .4;  line-height: 11px;  width: 25px;  height: 25px;
    outline: 0 !important;  text-align: center;  padding: 3px;   font-weight: 400;
}
.alert.float-alert button.close:hover {   opacity: .55;}
.alert.float-alert .close~span {   display: block;   max-width: 89%;}
</style>
@include('frontend.allinfo.messages')
