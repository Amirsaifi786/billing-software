<!-- resources/views/gst/result.blade.php -->
<h1>GST Details</h1>

@if($gstDetails)
    <p><strong>GST Number:</strong> {{ $gstDetails['gst_number'] }}</p>
    <p><strong>Business Name:</strong> {{ $gstDetails['business_name'] }}</p>
    <p><strong>Address:</strong> {{ $gstDetails['address'] }}</p>
    <!-- Display other fields as per the API response -->
@else
    <p>No details found for the provided GST number.</p>
@endif

<a href="{{ route('search.gst') }}">Search another GST number</a>
