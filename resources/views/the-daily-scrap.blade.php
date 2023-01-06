@extends('layout')

@section('title', 'The Daily Scrap -')

@section('content')
<h2>The Daily Scrap</h2>
<p>
    <ul style="text-align: left">
        <li>You write The Daily Scrap.</li>
        <li>Length has to be between 600 and 3000 characters (≃ 500 words).</li>
        <li>Contribute: <a href="/the-daily-scrap" {!! empty($db->scrap)?"onclick='showScrabForm(); return false;'":"" !!} > <i class="fa fa-plus"></i> Add a new Scrap</a>      
        </li>
    </ul>
</p>

<span class="glyphicon glyphicon-search"></span>

<form id="scrapForm" action="{{ empty($db->scrap)?'/the-daily-scrap/create':'/the-daily-scrap/update/'.$db->id }}"
    method="POST" class="{{ empty($db->scrap)?'d-none':'d-block' }}" style="text-align:left;">
    <span class='{{ empty($db->scrap)?"badge badge-dark":"badge badge-warning" }}'>
    {{ empty($db->scrap)?"Add":"Update" }}
    </span>
    
    {!! empty($db->scrap)?"":"<p>To accomplish a successful update you will need to accompany your work with the email and the password you used when firstly submitting The Daily Scrap of yours.</p>" !!}
    
    {{ csrf_field() }}
    <input type="hidden" name="recaptcha" id="recaptcha">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">*Email:</label>
            <input type="email" id="emailScrap" name="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">*Password:</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">*Title:</label>
            <input type="text" value="{{  empty($db->title)?'':$db->title  }}" name="title" class="form-control"
                id="exampleFormControlInput1" placeholder="Title">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">*Author name:</label>
            <input value="{{  empty($db->user['name'])?'':$db->user['name']  }}" type="text" name="name" class="form-control" id="exampleFormControlInput1"
                placeholder="Author">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">*Scrap:</label>
        <textarea class="form-control" onkeyup="countChar(this)" name="scrap" id="exampleFormControlTextarea1" 
            rows="3">{{  empty($db->scrap)?'':$db->scrap  }}</textarea>
            <div>Characters: <span id="charNum">3000</span></div>
    </div>
    
    <div id="errScrap" class="alert alert-warning text-left" style="display:none" role="alert"></div>
    
    <button type="submit" id="scrapSub" class="{{ empty($db->scrap)?'btn btn-dark':'btn btn-warning' }}">
    {{ empty($db->scrap)?'Submit':'Update' }}
    </button>

    <!-- recaptcha v3 -->
    <input type="hidden" name="g-recaptcha-response-scrap">

</form>


@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger text-left">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (count($scraps) > 0)
@foreach($scraps as $scrap)
<h3 style="margin: 50px 0 0 0"><a href="/the-daily-scrap/{{ str_slug($scrap->title) }}/{{ $scrap->id }}" class="text-dark">{{ $scrap->title }}</a></h3>
<p class="text-center" style="font-size: 16px;letter-spacing: 3px;font-style: italic;">
    - <br>
    by {{ $scrap->user['name'] }}
</p>

{!! $scrap['scrap'] !!}
<div class="container">
    <div class="row">
        <small class="text-muted">
            <a href="/the-daily-scrap/1/beforeUpdate/{{ $scrap->id }}"><i class="fa fa-pencil"
                    aria-hidden="true"></i></a> Last update: {{ date('d. m. Y', strtotime($scrap->updated_at)) }}
        </small>

    </div>
</div>
@endforeach
<p>{{ $scraps->links() }}</p>

@else
<div class="alert alert-info" role="alert">
    No scraps have been written yet.
</div>
@endif

<!--
<h3>Dummy test</h3>
<button onclick="typeWriterByWords()">Click me</button>
<p id="demo"></p>
!-->

<script>

  function countDown(param){   
    $('#countDown').text(param);

    if(param>1) {
      param -= 1;
      setInterval(function() { countDown(param); }, 1000);
    } else {
      $(location).attr('href','/the-daily-scrap');
    }
  }


</script>

<script>
      function countChar(val) {
        var id = $('#charNum');
        var len = val.value.length;
        if (len >= 3000) {
          val.value = val.value.substring(0, 3000);
          id.text(0);
        } else {
          id.text(3000 - len);
        }
      };
</script>

<script>
 function addScrapAjax()
 {
    updateRecaptchaToken('scrap', '-scrap');

    $("#scrapSub").click(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var emailScrap = $('#emailScrap').val();
        var title = $('[name="title"]').val();
        var scrap = $('[name="scrap"]').val();
        var name = $('[name="name"]').val();
        var password = $('[name="password"]').val();
        var recaptcha = $('[name="g-recaptcha-response-scrap"]').val();

/** finish the repatcha function. add a parameter and reuse it. */

        if (emailScrap && title && scrap && name && password && recaptcha) {
            $this = $('scrapSub');
            $this.prop('disabled', true);

            $.ajax({
                    type: "post",
                    url: "{{ empty($db->scrap)?'/the-daily-scrap/create':'/the-daily-scrap/update/'.$db->id }}",
                    data: {
                        '_token': CSRF_TOKEN,
                        'title': title,
                        'email': emailScrap,
                        'scrap': scrap,
                        'name': name,
                        'password': password,
                        'g-recaptcha-response-scrap': recaptcha,
                    }
                })
                .done(function(response) {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'false') {
                        $('#errScrap').text(jsonResponse.message).css('display', 'block');
                    } else {
                        var count = 12; 

                        countDown(count);

                        $("#scrapForm").replaceWith(
                            "<div class=\"alert alert-success text-left\" role=\"alert\">" +
                            "<h4 class=\"alert-heading\">Well done!</h4>" +
                            "<i class=\"fa fa-check\" aria-hidden=\"true\"></i> " +
                            "Thank you " + name + ". " + jsonResponse.message + " You will recieve an email with associated update link shortly." +
                            "<hr>" +
                            "<p class=\"mb-0\">Page will be redirected to: <a href=\"/the-daily-scrap\" class=\"alert-link\">The Daily Scrap</a> in <span id=\"countDown\">" + count + "</span> seconds</p>"+
                            "</div>");

                        $('#errScrap').text("").css('display', 'none');
                    }

                    updateRecaptchaToken('scrap', '-scrap');
                    $this.prop('disabled', false);
                })
                .fail(function(response) {
                    $('#errScrap').html(
                        "<i class=\"fa fa-times\" aria-hidden=\"true\"></i> Something went terribly wrong!"
                    ).css('display', 'block');

                    updateRecaptchaToken('scrap', '-scrap');
                });
        } else {
          
          if(!title){
            msg = "Enter the title.";
          } else if(!emailScrap){
            msg = "Enter your email.";
          } else if(!name){
            msg = "Enter your name.";
          } else if(!scrap) {
            msg = "The field scrap is empty.";
          } else if(!password){
            msg = "You need to enter a password.";
          } else {
            msg = "Back up your text and refresh the webpage.";
          }
            $('#errScrap').html(
                    "<i class=\"fa fa-times\" aria-hidden=\"true\"></i> " + msg)
                .css('display', 'block');
        }
        
        return false;
      
    });
  }

  addScrapAjax();
</script>


<script>
function showScrabForm() {
    $("#scrapForm").toggleClass("d-block d-none");
}

function cursor() {
    var cursor = true;
    var speedC = 260;

    setInterval(() => {
        if (cursor) {
            document.getElementById('cursor').style.display = "none";
            cursor = false;
        } else {
            document.getElementById('cursor').style.display = "inline";
            cursor = true;
        }
    }, speedC);

}

var i = 0;
var txt = 'Lorem ipsum dummy text.';
var txtInArray = (txt.split(' '));
var speed = 2600;
var bla = "";

var tag = document.getElementById("demo");

function typeWriterByWords() {
    cursor();
    if (i < txtInArray.length) {
        if (i > 0) bla = tag.innerHTML.replace(/<span [^>]+>\│<\/span>/gi, " ");
        // console.log("BLA: " + bla);

        content = bla + " " + txtInArray[i] + "<span id='cursor'>│</span>";

        //console.log("txtInArray: " + content);

        tag.innerHTML = content;

        i++;
        setInterval(typeWriterByWords, speed);
    }

}
</script>
@endsection