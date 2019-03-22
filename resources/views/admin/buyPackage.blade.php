@extends('admin.layout.blank')

@section('content')
<form action="/admin/buypackage" method="POST">
    <script
      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
      data-key="pk_test_wivGVUY4vBGCTN6KidhFwTj200umuNEDXx"
      data-amount="999"
      data-name="Stripe.com"
      data-description="Example charge"
      data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
      data-locale="auto"
      data-zip-code="true">
    </script>
  </form>
@endsection
