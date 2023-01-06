@extends('layout') 

@section('content')

<h2>Throw The Coin In</h2>


<div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'BVW6TM3QQJFNN',
image: {
src:'https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif',
alt:'Donate with PayPal button',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
</script>
</div>

@endsection