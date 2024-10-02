@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Customer Management</h4>
            <h6>Add/Update Customer</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('customerStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Customer Details -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="customer_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" required>
                                @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">Email ID</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="mobile_no">Mobile No<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}" required>
                                @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" rows="2" required>{{ old('address') }}</textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                                @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Country</label>
                                <select name="country" id="country" class="select">
                                    <option selected disabled>Select country</option>
                                    @foreach ($countries as $country)
                                    <option value={{$country->id}} @if(old('country')==$country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-select">
                                    <option disabled selected>Choose State</option>
                                    <!-- Dynamically populate state based on country -->
                                </select>
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-select">
                                    <option disabled selected>Choose City</option>
                                    <!-- Dynamically populate city based on state -->
                                </select>
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tax Information -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="tax_identification_no">Tax Identification No</label>
                                <input type="text" class="form-control" name="tax_identification_no" value="{{ old('tax_identification_no') }}">
                                @error('tax_identification_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="account_type">Account Type</label>
                                <select name="account_type" class="form-select" required>
                                    <option disabled selected>Select Type</option>
                                    <option value="debit" {{ old('account_type') == 'debit' ? 'selected' : '' }}>Debit</option>
                                    <option value="credit" {{ old('account_type') == 'credit' ? 'selected' : '' }}>Credit</option>
                                </select>
                                @error('account_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="opening_balance">Opening Balance</label>
                                <input type="text" class="form-control" name="opening_balance" value="{{ old('opening_balance') }}">
                                @error('opening_balance')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="document_type">Document Type</label>
                                <select name="document_type" class="form-select">
                                    <option disabled selected>Select Document Type</option>
                                    <option value="ID Card" {{ old('document_type') == 'ID Card' ? 'selected' : '' }}>ID Card</option>
                                    <option value="Passport" {{ old('document_type') == 'Passport' ? 'selected' : '' }}>Passport</option>
                                    <!-- Add more options if needed -->
                                </select>
                                @error('document_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="document_no">Document No</label>
                                <input type="text" class="form-control" name="document_no" value="{{ old('document_no') }}">
                                @error('document_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="anniversary_date">Anniversary Date</label>
                                <input type="date" class="form-control" name="anniversary_date" value="{{ old('anniversary_date') }}">
                                @error('anniversary_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="credit_allowed">Credit Allowed</label>
                                <div>
                                    <input type="radio" name="credit_allowed" value="1" {{ old('credit_allowed') == 1 ? 'checked' : '' }}> Yes
                                    <input type="radio" name="credit_allowed" value="0" {{ old('credit_allowed') == 0 ? 'checked' : '' }}> No
                                </div>
                                @error('credit_allowed')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="credit_limit">Credit Limit</label>
                                <input type="text" class="form-control" name="credit_limit" value="{{ old('credit_limit') }}">
                                @error('credit_limit')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" class="form-control" name="avatar">
                                @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Remark">Remark<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="remark" rows="3" required>{{ old('remark') }}</textarea>
                                @error('remark')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('customerIndex') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
