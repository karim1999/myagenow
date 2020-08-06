<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Almarai|Open+Sans&display=swap" rel="stylesheet">



    @php
        $api= \App\Http\Controllers\ApiController::get_content();
    @endphp
    <?php $version= '?v='.time(); ?>
    <link rel="icon" type="image/png" href="@if(session('language')=="ar") {{$api['site_profile']->icon_ar}} @else {{$api['site_profile']->icon_en}} @endif " />
    <meta name=" description" content="
  @if(session('language')=="ar") {{$api['site_profile']->site_description_ar}} @else {{$api['site_profile']->site_description_en}} @endif ">

    <title>
        @if(session('language')=="ar") {{$api['site_profile']->site_name_ar}} | {{$api['site_profile']->site_sub_name_ar}} @else {{$api['site_profile']->site_name_en}} | {{$api['site_profile']->site_sub_name_en}} @endif </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="
  @if(session('language')=="ar") {{$api['site_profile']->ar_keywords}} @else {{$api['site_profile']->en_keywords}} @endif
        ">
    {!!$api['site_profile']->google_analytics!!}


</head>
<style type="text/css">
    body {
        font-family: 'Almarai', sans-serif;
        background-color: #f8f9fa;
    }
    input[type= "number"].custom-select{
        background: none;
    }

    .btn {
        background-color: rgb(60, 101, 187);
        border-color: rgb(60, 101, 187)
    }

    .dark,
    .dark * {
        background-color: #161616;
        color: #e6e6e6;
        border-color: #111;
    }

    * {
        @if(session('language')=="ar")
direction: rtl;
        @else
direction: ltr;
        @endif
outline: unset !important;
    }

</style>

<body
    @if(session('mode')=="night")
    class="dark"
    @endif
>









<!-- after body -->
<div class="col-12 px-0">
    <div class="col-12 px-0">
        @if(session('language')=="ar" && session('popup_status')!="false" && $api['advs']->popup_status==1)
            {!!$api['advs']->popup_ar!!}
        @else
            {!!$api['advs']->popup_en!!}
        @endif
    </div>
    @if($api['advs']->header_status==1 &&  session('header_status')!="false")
        <div class="col-12 px-0" style="background-color: #EB593C; color: white; text-align: center; padding: 5px">
            @if(session('language')=="ar")
                {!!preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $api['advs']->header_ar)!!}
            @else
                {!!preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $api['advs']->header_en)!!}
            @endif
        </div>
    @endif
</div>

























<!--dark mood -->
<div class="col-12 px-0">
    <div class="container">
        <div class="d-inline-block mx-2">
            @if(session('language')=="ar")
                <a href="{{route('switch_language')}}" style="color: #919191">English</a>
            @else
                <a href="{{route('switch_language')}}" style="color: #919191">العربية</a>
            @endif
        </div>


        <div class="custom-control custom-switch mt-2  ml-0 d-inline-block">
            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                   @if(session('mode')=="night")
                   checked=""
                @endif
            >
            <label class="custom-control-label text-muted" for="customSwitch1">@lang('index.mood')</label>



        </div>


    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h5 class="modal-title  p-2 px-3" id="exampleModalLongTitle" style="padding: 10px">@lang('index.age')</h5>
                <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close" style="float: unset!important">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless res" id="res-valid" style="display: none;">
                    <thead>
                    <tr>
                        <th class="text-center">@lang('index.day')</th>
                        <th class="text-center">@lang('index.month')</th>
                        <th class="text-center">@lang('index.year')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center" id="res-day"></td>
                        <td class="text-center" id="res-month"></td>
                        <td class="text-center" id="res-year"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="col-12 px-0 py-2 text-center res" id="res-un-valid" style="display: none;">
                    @lang('index.not_valid_date')
                </div>
                <div class="col-12 px-0 py-2 text-center res" id="res-year" style="display: none;">
                </div>
            </div>
        </div>
    </div>
</div>
<!--logo-->

<!-- Logo API -->
<div style="display: flex; align-items: center; justify-content: center;">
    <a href="{{env('APP_URL')}}">
        @if(session('language')=='ar' && session('mode')=='day')
            <img id="logo" class="rounded" src="{{$api['site_profile']->logo_ar_path}}" height="170" width="170">
        @elseif(session('language')=='ar' && session('mode')=='night')
            <img id="logo" class="rounded" src="{{$api['site_profile']->logo_ar_path_dark}}" height="170" width="170">
        @elseif(session('language')!='ar' && session('mode')=='day')
            <img id="logo" class="rounded" src="{{$api['site_profile']->logo_en_path}}" height="170" width="170">
        @elseif(session('language')!='ar' && session('mode')=='night')
            <img id="logo" class="rounded" src="{{$api['site_profile']->logo_en_path_dark}}" height="170" width="170">
        @endif
    </a>
</div>




<!--first card : age counter -->
<div class="container">
    <div class="card text-center shadow p-1 mb-5 sm-white rounded rounded">
        <div class="row">
            <div class="col-md-6 ml-5 mr-5">
                <div class="card-body">
                    <h3 class="card-title mb-4">@lang('index.calc_age_title')</h3>
                    <input min="1" max="31" step="1" placeholder="@lang('index.day')" type="number" class="custom-select custom-select-lg mb-3 text-right" id="input-day">
                    <input min="1" max="12" step="1" placeholder="@lang('index.month')" type="number" class="custom-select custom-select-lg mb-3 text-right" id="input-month">
                    <input min="1920" max="{{date('Y')}}" step="1" placeholder="@lang('index.year')" type="number" class="custom-select custom-select-lg mb-3 text-right" id="input-year">
{{--                    <select class="custom-select custom-select-lg mb-3 text-right" id="input-day">--}}
{{--                        <option selected disabled="">@lang('index.day')</option>--}}
{{--                        @for($i=1;$i<32;$i++) <option value="{{$i}}">{{$i}}</option>--}}
{{--                        @endfor--}}
{{--                    </select>--}}
{{--                    <select class="custom-select custom-select-lg mb-3 text-right" id="input-month">--}}
{{--                        <option selected disabled="">@lang('index.month')</option>--}}
{{--                        @for($i=1;$i<13;$i++) <option value="{{$i}}">{{$i}}</option>--}}
{{--                        @endfor--}}
{{--                    </select>--}}
{{--                    <select class="custom-select custom-select-lg mb-3 text-right" id="input-year">--}}
{{--                        <option selected disabled="">@lang('index.year')</option>--}}
{{--                        @for($i=date('Y');$i>1920;$i--)--}}
{{--                            <option value="{{$i}}">{{$i}}</option>--}}
{{--                        @endfor--}}
{{--                    </select>--}}
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" onclick="myAgeValidation()">@lang('index.calc')</a>
                </div>
            </div>
            <div class="col-4 d-none d-md-block">
                <img src="/public/images/people.png" class="img-fluid mt-5 mr-5   sm-white rounded " alt="Responsive image" height="500" width="500">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card text-center shadow p-1 mb-5 sm-white rounded mx-auto" style="width: 30rem;max-width: 100%">
        <div class="card-body">
            <h3 class="card-title"> @lang('index.what_will_be_my_age') </h3>
            <div class="input-group mb-3 py-4">
                <input placeholder="@lang('index.year')" type="text" class="form-control text-right" aria-label="Text input with dropdown button" id="input-year-alone">
            </div>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" onclick="
    var x = $('#input-year-alone').val();
    myAgeValidation(x);"> @lang('index.calc') </a>
        </div>
    </div>
</div>
<!--footer-->
<footer class="footer mt-auto py-3 ">
    <div class="container">
        <div class="col-12 px-0 d-flex justify-content-between row">
            <div class="col-12 col-md-6 pt-2 text-center text-md-center">
                <span class="text-muted d-inline"> @lang('index.copy_rights') </span>
            </div>
            <div class="col-12 col-md-6 pt-2 text-center text-md-center">
                <span class="list-inline-item text-muted mx-2">@lang('index.terms')</span>
                <span class="list-inline-item text-muted mx-2">@lang('index.privacy')</span>
            </div>
        </div>
    </div>
</footer>
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<!--footer 1-->
<link rel="stylesheet" type="text/css" href="https://footer.devlab.ae/public/styles.css">
@if(session('language')!='en')
    <!--#171734 = night background color & f5f7fb = day background color -->
    <iframe src="https://footer.devlab.ae/ar?mode={{session('mode')}}&night_bg=161616&day_bg=f8f9fa" class="col-12 footer-iframe px-0" style="width: 100%" id="devlab-footer"></iframe>
@else
    <iframe src="https://footer.devlab.ae/en?mode={{session('mode')}}&night_bg=161616&day_bg=f8f9fa" class="col-12 footer-iframe px-0" style="width: 100%"  id="devlab-footer" ></iframe>
@endif

<!--footer 2-->
@if(session('language')=="ar" && $api['footer']->footer_ar_enabled==1)
    {!!$api['footer']->footer_ar!!}
@elseif($api['footer']->footer_en_enabled==1)
    {!!$api['footer']->footer_en!!}
@endif




<script type="text/javascript">
    $(".custom-control-label").on("click", function() {
        if ($("body").hasClass("dark")) {
            $("body").removeClass("dark");
            $('#devlab-footer').attr('src',
                'https://footer.devlab.ae/en?mode=day&night_bg=161616&day_bg=f8f9fa'
            );
            $.ajax({
                method: "get",
                url: "/update_mode",
                data: { mode: 'day' }
            }).done(function(msg) {});


        } else {
            $("body").addClass("dark");
            $('#devlab-footer').attr('src',
                'https://footer.devlab.ae/en?mode=night&night_bg=161616&day_bg=f8f9fa'
            );



            $.ajax({
                method: "get",
                url: "/update_mode",
                data: { mode: 'night' }
            }).done(function(msg) {});
        }
    });

    function _addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    function myAgeValidation(year) {

        var lre = /^\s*/;
        var datemsg = "";
        var inputDate = $('#input-month').val() + '/' + $('#input-day').val() + '/' + $('#input-year').val();
        inputDate = inputDate.replace(lre, "");
        //document.as400samplecode.myDate.value = inputDate;
        var d = new Date();
        var n = d.getFullYear();


        //alert(year);
        datemsg = isValidDate(inputDate);
        if (datemsg != "" || (year - n) <= 0) {

            $('#res-valid').fadeOut(0);
            $('#res-un-valid').slideDown();

            //alert(datemsg);
            return;
        } else {
            //Now find the Age based on the Birth Date
            var date = new Date(inputDate);
            var date_now = new Date();
            if ((year - n) > 0) {
                future_date = _addDays(date_now, (year - n) * 365);
                getAge(date, 1, future_date);
            } else {

                getAge(new Date(inputDate));
            }
        }

    }

    function getAge(birth, future, future_date) {


        if (future) {

            var nowyear = future_date.getFullYear();
            var nowmonth = future_date.getMonth();
            var nowday = future_date.getDate();


            var birthyear = birth.getFullYear();
            var birthmonth = birth.getMonth();
            var birthday = birth.getDate();
        } else {

            var today = new Date();
            var nowyear = today.getFullYear();
            var nowmonth = today.getMonth();
            var nowday = today.getDate();

            var birthyear = birth.getFullYear();
            var birthmonth = birth.getMonth();
            var birthday = birth.getDate();
        }



        var age = nowyear - birthyear;
        var age_month = nowmonth - birthmonth;



        var age_day = nowday - birthday;
        if (age_day < 0) {
            age_month--;
            age_day += 30;
        }


        if (age_month < 0) {
            age--;
            age_month += 12;
        }


        if (age_month < 0 || (age_month == 0 && age_day < 0)) {
            age = parseInt(age) - 1;
        }

        $('#res-un-valid').fadeOut(0);
        $('#res-valid').slideDown();
        $('#res-day').html(age_day);
        $('#res-month').html(age_month);
        $('#res-year').html(age);






        console.log(age + "year " + age_month + " month " + age_day + " day ");
        // alert(age_month);

        /*  if ((age == 18 && age_month <= 0 && age_day <=0) || age < 18) {
          }
          else {
              alert("You have crossed your 18th birthday !");
          }*/

    }

    function isValidDate(dateStr) {


        var msg = "";
        // Checks for the following valid date formats:
        // MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY
        // Also separates date into month, day, and year variables

        // To require a 2 & 4 digit year entry, use this line instead:
        //var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/;
        // To require a 4 digit year entry, use this line instead:
        var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

        var matchArray = dateStr.match(datePat); // is the format ok?
        if (matchArray == null) {
            msg = "Date is not in a valid format.";
            return msg;
        }

        month = matchArray[1]; // parse date into variables
        day = matchArray[3];
        year = matchArray[4];
        if (month < 1 || month > 12) { // check month range
            msg = "Month must be between 1 and 12.";
            return msg;
        }

        if (day < 1 || day > 31) {
            msg = "Day must be between 1 and 31.";
            return msg;
        }

        if ((month == 4 || month == 6 || month == 9 || month == 11) && day == 31) {
            msg = "Month " + month + " doesn't have 31 days!";
            return msg;
        }

        if (month == 2) { // check for february 29th
            var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
            if (day > 29 || (day == 29 && !isleap)) {
                msg = "February " + year + " doesn't have " + day + " days!";
                return msg;
            }
        }

        if (day.charAt(0) == '0') day = day.charAt(1);

        //Incase you need the value in CCYYMMDD format in your server program
        //msg = (parseInt(year,10) * 10000) + (parseInt(month,10) * 100) + parseInt(day,10);

        return msg; // date is valid
    }

</script>
</body>

</html>
