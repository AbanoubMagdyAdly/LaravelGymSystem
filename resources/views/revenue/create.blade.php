@extends('admin.layout.blank')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Gym</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form"   action="{{route('revenue.store')}}" method="POST">
            @csrf
            <div class="card-body">

            <div class="form-group">
                    <label for="trainee_id">trainee</label>
                    <select  name="trainee_id" class="form-control" id="trainee_id">
                        @foreach($trainees as $trainee)
                            <option value="{{$trainee->id}}">
                                {{$trainee->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                </div>

                <div class="form-group">
                    <label for="city_id">cities</label>
                    <select  name="city_id" class="form-control" id="city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">
                                {{$city->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                </div>
                <div class="form-group">
                    <label for="package_id">packages</label>
                    <select  name="package_id" class="form-control" id="package_id">
                        @foreach($packages as $package)
                            <option value="{{$package->id}}">
                                {{$package->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                </div>
                <div class="form-group">
                    <label for="trainee_id">trainees</label>
                    <select  name="trainee_id" class="form-control" id="trainee_id">
                        @foreach($trainees as $trainee)
                            <option value="{{$trainee->id}}">
                                {{$trainee->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
        <form action="/admin/buypackage" method="POST">
    <script
      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
      data-key="pk_test_wivGVUY4vBGCTN6KidhFwTj200umuNEDXx"
      data-amount="9988"
      data-name="Stripe.com"
      data-description="Example charge"
      data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
      data-locale="auto"
      data-zip-code="true">
    </script>
  </form>
    </div>
    <!-- /.card -->
@endsection
