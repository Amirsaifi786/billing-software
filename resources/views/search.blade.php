<!-- resources/views/gst/search.blade.php -->
<form action="{{ route('search.gst') }}" method="POST">
    @csrf
    <label for="gst_number">Enter GST Number:</label>
    <input type="text" id="gst_number" name="gst_number" required>
    <button type="submit">Search GST</button>
</form>
