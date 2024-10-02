@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Customer Management</h4>
            <h6>Update Customer</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('customerUpdate',$customers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Customer Details -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="customer_name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('customer_name') @enderror " name="customer_name" value="{{ old('customer_name',$customers->customer_name) }}" required>
                                @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">Email ID</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$customers->email) }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="mobile_no">Mobile No<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{old('mobile_no',$customers->mobile_no)}}" required>
                                @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="2" required>{{ old('address',$customers->address) }}</textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code',$customers->zip_code) }}">
                                @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Country</label>
                                <select name="country" id="country" class="select">
                                    <option selected disabled>Select country</option>
                                    @foreach ($countries as $country)
                                    <option value={{$country->id}} @if(old('country')==$country->id || $customers->country) selected @endif>{{ $country->name }}</option>
                        @endforeach
                        </select>
                    </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" id="state" class="form-select">
                        <option disabled selected>Choose State</option>
                        @if($customers->state!==null)
                        <option value="{{ $customers->id }}">{{ $customers->state }}</option>
                        @endif
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
                    </select>
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Choose Country</label>
                    <select name="country" id="country" class="select">
                        <option selected disabled>Select country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ (old('country') == $country->id || $customers->country == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" id="state" class="form-select">
                        <option disabled selected>Choose State</option>
                        @if($customers->state !== null)
                        @foreach ($states as $state)
                        <option value="{{ $state->id }}" {{ (old('state') == $state->id || $customers->state == $state->id) ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                        @endif
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
                        @if($customers->city !== null)
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ (old('city') == $city->id || $customers->city == $city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                        @endif
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
                    <input type="text" class="form-control @error('tax_identification_no') is-invalid @enderror" name="tax_identification_no" value="{{ old('tax_identification_no',$customers->tax_identification_no) }}">
                    @error('tax_identification_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="account_type">Account Type</label>
                    <select name="account_type" class="form-select" required>
                        <option disabled>Select Type</option>
                        <option value="debit" {{ old('account_type', $customers->account_type) == 'debit' ? 'selected' : '' }}>Debit</option>
                        <option value="credit" {{ old('account_type', $customers->account_type) == 'credit' ? 'selected' : '' }}>Credit</option>
                    </select>
                    @error('account_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="opening_balance">Opening Balance</label>
                    <input type="text" class="form-control @error('opening_balance') is-invalid @enderror" name="opening_balance" value="{{ old('opening_balance',$customers->opening_balance) }}">
                    @error('opening_balance')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="document_type">Document Type</label>
                    <select name="document_type" class="form-select">
                        <option disabled>Select Document Type</option>
                        <option value="ID Card" {{ old('document_type', $customers->document_type) == 'ID Card' ? 'selected' : '' }}>ID Card</option>
                        <option value="Passport" {{ old('document_type', $customers->document_type) == 'Passport' ? 'selected' : '' }}>Passport</option>
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
                    <input type="text" class="form-control @error('document_no')in-valid @enderror" name="document_no" value="{{ old('document_no',$customers->document_no) }}">
                    @error('document_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth',$customers->date_of_birth) }}">
                    @error('date_of_birth')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="anniversary_date">Anniversary Date</label>
                    <input type="date" class="form-control @error('anniversary_date') is-invalid @enderror" name="anniversary_date" value="{{ old('anniversary_date',$customers->anniversary_date) }}">
                    @error('anniversary_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="credit_allowed">Credit Allowed</label>
                    <div>
                        <input type="radio" name="credit_allowed" value="1" {{ old('credit_allowed',$customers->credit_allowed) == 1 ? 'checked' : '' }}> Yes
                        <input type="radio" name="credit_allowed" value="0" {{ old('credit_allowed',$customers->credit_allowed) == 0 ? 'checked' : '' }}> No
                    </div>
                    @error('credit_allowed')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="credit_limit">Credit Limit</label>
                    <input type="text" class="form-control  @error('credit_limit') is-invalid @enderror" name="credit_limit" value="{{ old('credit_limit',$customers->credit_limit) }}">
                    @error('credit_limit')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label for="Remark">Remark<span class="text-danger">*</span></label>
                    <textarea class="form-control  @error('remark') is-invalid @enderror" name="remark" rows="3" required>{{ old('remark',$customers->remark) }}</textarea>
                    @error('remark')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="mb-3">
                        @if($customers->avatar)
                        <label for="avatar" class="form-label">Avatar</label>
                        <div class="mb-3">
                            <img src="{{ asset('storage/images/' . $customers->avatar) }}" alt="Customer Avatar" style=" border-radius:50%; max-width: 150px; max-height: 150px;">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="avatar" name="avatar">
                        @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>


        </div>


        <!-- Submit Button -->
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-submit me-2">Update</button>
                <a href="{{ route('customerIndex') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </div>
        </form>

    </div>
</div>
</div>

</div>

@endsection
