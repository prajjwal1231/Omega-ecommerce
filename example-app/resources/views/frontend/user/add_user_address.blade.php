@extends('frontend.master')
@section('content')
 <!-- New Address Form Starts -->
 <div class="container mt-5 mb-5">
    <h3 class="font-weight-bold">Add a new address</h3>
    <p class="font-weight-bold">Or pick up your packages at your convenience from our self-service locations.</p>
    <!-- New Address Form Starts -->
    <form class="mx-auto font-weight-bold needs-validation" autocomplete="off" method="post" novalidate>
      <div class="form-group">
        <label for="country">Country/Region</label>
        <select class="form-control" id="country" name="country" required>
          <option value="0">India</option>
          <option value="1">Pakistan</option>
          <option value="2">Bangladesh</option>
          <option value="3">Nepal</option>
          <option value="4">Sri Lanka</option>
        </select>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in Country/Region.
        </div>
      </div>

      <div class="form-group">
        <label for="username">Full name</label>
        <input type="text" class="form-control" id="username" name="username" value="{{$name}}" required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in full name.
        </div>
      </div>

      <div class="form-group">
        <label for="mobileNumber">Mobile number</label>
        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber"
          placeholder="10-digit mobile number without prefixes" required>
        <small>May be used to assist delivery</small>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in mobile number.
        </div>
      </div>

      <div class="form-group">
        <label for="pincode">PIN code</label>
        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="6 digit [0-9] PIN Code"
          required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in PIN code.
        </div>
      </div>

      <div class="form-group">
        <label for="houseNumber">Flat, House no., Building, Company, Apartment</label>
        <input type="text" class="form-control" id="houseNumber" name="houseNumber" required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in Flat no.
        </div>
      </div>

      <div class="form-group">
        <label for="area">Area, Colony, Street, Sector, Village</label>
        <input type="text" class="form-control" id="area" name="area" required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in area.
        </div>
      </div>

      <div class="form-group">
        <label for="landmark">Landmark</label>
        <input type="text" class="form-control" id="landmark" name="landmark"
          placeholder="E.g. Near AIIMS Flyover, Behind Regal Cinema, etc." required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in landmark.
        </div>
      </div>

      <div class="form-group">
        <label for="city">Town/City</label>
        <input type="text" class="form-control" id="city" name="city" required>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in town/city.
        </div>
      </div>

      <div class="form-group">
        <label for="state">State / Province / Region</label>
        <select class="form-control" id="state" name="state" required>
          <option value="0">India</option>
          <option value="1">Pakistan</option>
          <option value="2">Bangladesh</option>
          <option value="3">Nepal</option>
          <option value="4">Sri Lanka</option>
        </select>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in state.
        </div>
      </div>

      <div class="form-group">
        <label for="addressType">Address Type</label>
        <select class="form-control" id="addressType" name="addressType" required>
          <option value="0">Select an Address Type</option>
          <option value="1">Home (7 am – 9 pm delivery)</option>
          <option value="2">Office/Commercial (10 AM - 6 PM delivery)</option>
        </select>
        <div class="valid-feedback">
          <i class="far text-success fa-thumbs-up"></i> OK
        </div>
        <div class="invalid-feedback">
          <i class="fas text-danger fa-exclamation-triangle"></i> Some error in address type.
        </div>
      </div>
      <button type="submit" class="btn btn-warning shadow rounded">Add address</button>
    </form>

  </div> <!-- New Address Form Starts -->
@endsection
