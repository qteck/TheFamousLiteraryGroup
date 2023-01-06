<!doctype html>
<html prefix="og: http://ogp.me/ns#" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name='googlebot' content='index,follow,noarchive'>
    <meta name="description"
        content="The Famous Literary Group is an international branch out of the Czech literary group Slavná literární skupina Kerouac founded in 2011.">
    <meta name="keywords" content="the famous literary group, literary group, czech, english">
    <meta name="author" content="The Famous Literary group">

    <meta property="og:url" content="http://thefamousliterarygroup.co.uk">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The famous Literary Group">
    <meta property="og:description"
        content="The Famous Literary Group is an international branch out of the Czech literary group Slavná literární skupina Kerouac founded in 2011.">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="thefamousliterarygroup.co.uk">
    <meta property="og:image" content="http://thefamousliterarygroup.co.uk/images/times.jpg">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') The Famous Literary Group </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Styles -->
    <style>
    
body {
  background-image: url('@yield('background')');
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


.container {
    background-color: white;
}

    h2, .h2s {
        color: #000;
        font-family: 'Lato', sans-serif;
        font-size: 54px;
        font-weight: 300;
        line-height: 58px;
        margin: 50px 0 58px;
    }

    h3 {
        color: #000;
        font-family: 'Lato', sans-serif;
        font-size: 34px;
        font-weight: 300;
        line-height: 40px;
        margin: 50px 0 40px;
      }

    p {
        text-align: justify;
        text-justify: inter-word;
        font-family: 'PT Serif', serif;
        word-spacing: 2px;
        font-size: 20px;
        font-weight: lighter;
        line-height: 1.8;
    }

    strong {font-weight: bold; }
    .card strong {font-weight: normal !important;}

    header {
        margin-bottom: 20px;
    }

    footer {
        border-top: 1px solid black;
        margin-top: 20px;
        padding: 16px 0 50px 0;
    }

    .fb {
        width: 30px;
    }

    .place-time {
        font-size: 18;
        font-style: italic;
        margin-bottom: 10px;
    }

    .grecaptcha-badge {
        visibility: hidden;
    }
    </style>
</head>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha.site_key') }}"></script>
 
<script>
    function updateRecaptchaToken(action, param) {
        let siteKey = "{{ config('app.recaptcha.site_key') }}"
        grecaptcha.ready(function() {
            grecaptcha.execute(siteKey, {
                    action: action
                })
                .then(function(token) {
                    $('input[name=g-recaptcha-response'+ param +']').val(token);
                })
        })
    }
</script>
<body>
    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <header>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <p>
                                        <h2>
                                            <a href="https://thefamousliterarygroup.co.uk/" style="color: black;">The Famous Literary Group</a>
                                        </h2>
                                    </p>

                                    <nav class="text-left">
                                        <div class="d-flex flex-column">
                                            <div class="p-2 bg-light mt-2 pl-3"><a href="/the-daily-scrap"
                                                    class="text-dark">The Daily Scrap</a></div>

                                            <div class="p-2 bg-light mt-2 pl-3"><a href="/the-famous-translations"
                                                    class="text-dark">The Famous Translations</a></div> 
                                                    
                                            <!--<div class="p-2 bg-light mt-2 pl-3"><a href="/the-daily-scrap"
                                                    class="text-dark">The Famous Secret</a></div> 

                                            <div class="p-2 bg-light mt-2 pl-3"><a href=""
                                                    class="text-dark"></a></div> !-->
                                        </div>
                                    </nav>
                                    <p style="margin-top: 20px; font-size: 12px" class="text-secondary">Disclosure: <br> This website is written by diverse community of people.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-left">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">We are</h5>
                                    <p>
                                        <strong>one</strong> of the very few literary groups who cares more of <strong>a
                                            bottle of Jack</strong> than of <strong>you</strong>.
                                        Yet, you are here going through the <strong>work</strong> of such
                                        <strong>people</strong>.
                                        And the <strong>sights</strong> are heavy on you; and it is not
                                        <strong>sights</strong> of <strong>understanding</strong>.
                                        But you <strong>do not look away</strong> for that you <strong>believe in the
                                            correctness of your doing</strong>; the <strong>attention</strong> is merely
                                        surreal - and the response is <strong>indifference</strong>; and y are
                                        <strong>famous*</strong> - sippin’ Jack with <strong>us</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">...</h5>
                                   <!-- 
                                       <p>We are building the literary castle out of wood. Wood is a lovely malleable
                                        material that suffers from humanly imperfections. Every single three shines with
                                        the spirit and every burnt log turns the spirit into pile of ash.</p>
                                    <p>
                                    -->

<p>And there the tree stems, 
as magnificent as an old deer, 
peacocking with wide tall 
green crown and glossy leaves</p> 

<p>rooted in soil as the famous castle</p>

<p>and one can hear the air humming through 
and the branches crack 
simultaneously with the hearts 
and the bones and the teeth… 
And the antlers</p>

                                    
                                    <p>
                                        <div id="js-rotating">
                                            <!-- You are a sneaky cowboy;
                        give it a chance, return on the page,
                        get yourself a glass,
                        and experience,
                        what I want you to experience. -->
                                            The tendency to explore,
                                            the desire to understand,
                                            and the need to sound,
                                            predestines you to wonder,
                                            to contemplate,
                                            and to accept the feeling,
                                            for a glass of a whiskey.,
                                            It is not the glass that makes the whiskey,
                                            it is the journey from the field to the bottle.,
                                            You prepare a fermentation set,
                                            out of the nicest and strongest wood,
                                            you throw in grounded corn; rye and malted barley,
                                            then add some yeast, brown sugar and hot water.,
                                            The fermentation gives off a strong odour,
                                            but you love it.,
                                            You keep it in the basement,
                                            away from the sun.,
                                            You keep it at 34 C,
                                            To favour the yeast.,
                                            After three days of the fermentation,
                                            you separate the pulp from the juice.,
                                            You assemble your distillation set,
                                            distillation flask; burner; condensation pipe,
                                            thermometer; collection flask.,

                                            you got 100 litres of fermented corn; rye; malted barley,
                                            you got same sized whiskey barrel,
                                            but the volume of the distillation flask,
                                            is 2 litres.,
                                            The distilling is a slow process.,

                                            The thermometer shows 80 C,
                                            ethanol is sliding down the condensation pipe,
                                            you watch every drip.,
                                            First batch is ready,
                                            your chest is tingling.,
                                            You pick the shiniest glass,
                                            give it the unnecessary wipe,
                                            include a few ice cubes,
                                            and pour it in.,
                                            You feel the connection with the glass,
                                            with the basement,
                                            and yourself.,
                                            You are in a sacred place,
                                            your whiskey is on the table,
                                            you take it in your palm,
                                            you smell it.,
                                            It is the finest drink,
                                            thirty seconds old.,
                                            It tastes like distilled port wine,
                                            just super strong,
                                            emphasized with a subtle flavour of the brown sugar.,
                                            The Drink with The Journey.,
                                            <!-- must be index 51-->
                                            ** The End **
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </header>
                <hr>
                    <p class="text-right">
                        <a href="http://thefamousliterarygroup.co.uk/article/intro/6">Foreword</a>
                    </p>
                <hr>
                <article>
                    @yield('content')
                </article>
                <footer>
                    <p>
                        Founded in 2018; Last update: {{ $lastUpdate }}; <a
                            href="https://www.facebook.com/TheFamousLiteraryGroup/"><i class="fa fa-facebook-square" aria-hidden="true"></i>
</a>
                    </p>
                    <p>
                        The Famous Literary Group is an international branch out of the Czech literary group <a
                            href="https://www.facebook.com/literarniSkupinaKerouac/">Slavná literární skupina
                            Kerouac</a> founded in 2011.
                    </p>
                    <p>info@thefamousliterarygroup.co.uk</p>
                    <p>
                        <form id="formSub" action="/subscribe" method="POST" class="align-items-center">
                            <div class="form-row">
                                {{ csrf_field() }}
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Email</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" name="email" id="emailSub" class="form-control"
                                            id="inlineFormInputGroup" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group col-auto">
                                    <button type="submit" id="subscription" class="btn btn-secondary">Subscribe</button>
                                </div>
                            </div>
                            <!-- recaptcha v3 -->
                            <input type="hidden" name="g-recaptcha-response">
                        </form>

                        <div id="errSub" class="alert alert-warning" style="display:none" role="alert"></div>
                        <div class="container">
                            <div class="row">
                                <small>This site is protected by reCAPTCHA and the Google
                                    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                                    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                                </small>
                            </div>
                        </div>
                    </p>
                    <p><i>Related projects</i><br><a href="http://ihadacrackatit.com">I Had a Crack at it</a></p>
                </footer>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.js" crossorigin="anonymous"></script>

    <script>
    updateRecaptchaToken('subscription', '');

    $("#subscription").click(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var emailSub = $('#emailSub').val();
        var recaptcha = $('[name="g-recaptcha-response"]').val();
        if (emailSub && recaptcha) {
            $this = $('#subscription');
            $this.prop('disabled', true);

            $.ajax({
                    type: "post",
                    url: "/subscribe",
                    data: {
                        '_token': CSRF_TOKEN,
                        'email': emailSub,
                        'g-recaptcha-response': recaptcha,
                    }
                })
                .done(function(response) {
                    var jsonResponse = JSON.parse(response);
                    console.log(jsonResponse.status);
                    if (jsonResponse.status === 'false') {
                        $('#errSub').text(jsonResponse.message).css('display', 'block');
                    } else {
                        $("#formSub").replaceWith(
                            "<div class=\"alert alert-success\" role=\"alert\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i> " +
                            "Thank you " + emailSub + ".</div>");
                        $('#errSub').text("").css('display', 'none');
                    }
                    updateRecaptchaToken('subscription', '');
                    $this.prop('disabled', false);
                })
                .fail(function(response) {
                    console.log(response);
                    $('#errSub').html(
                        "<i class=\"fa fa-times\" aria-hidden=\"true\"></i> Something went terribly wrong!"
                    ).css('display', 'block');
                    updateRecaptchaToken('subscription', '');
                });
        } else {
            $('#errSub').html(
                    "<i class=\"fa fa-times\" aria-hidden=\"true\"></i> The form is empty. Insert your email.")
                .css('display', 'block');
        }
        return false;
    });
    </script>
    <script>
    $("#js-rotating").Morphext({
        animation: "fadeIn",
        speed: 4000,
        complete: function() {
            /*
            console.log("This is called after a phrase is animated in! Current phrase index: " + this.index);
            
            if(this.index == 51)
            {
            $("#js-rotating").css("background-color", "red").css("color","white");
            } else {
            $("#js-rotating").css("background-color", "yellow").css("color","black");
            }
            */
        }
    }).css("background-color", "yellow").css("padding", "10px").css("font-family", "Georgia").css("letter-spacing",
        "6px").css("color", "black");
    </script>

</body>

</html>