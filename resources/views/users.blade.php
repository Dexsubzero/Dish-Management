@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<h2>Import Users</h2>
<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Excel</button>
</form>

<h2>Export Users</h2>
<a href="{{ route('users.export') }}">
    <button>Download Excel</button>
</a>
