<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

    @yield('content')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-link.load-content[data-url]').on('click', function(e) {
                e.preventDefault();
                const url = $(this).data('url');

                // Set loading message
                $('#dashboard').html('<p>Loading...</p>');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#dashboard').html(response);
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.status, xhr.responseText);
                        $('#dashboard').html(
                            '<p class="text-danger">Failed to load content.</p>');
                    }
                });
            });
        });
    </script>

</body>

</html>
