<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Підключення CSS Bootstrap з CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Підключення бібліотеки jQuery з CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <!-- Підключення JS Bootstrap з CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Start Upload
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mx-auto" id="successMessage" style="display: none;"></div>
                    <form id="uploadForm" method="post" enctype="multipart/form-data">
                        <div class="form-group mx-auto">
                            <input type="file" name="file" />
                        </div>
                        <div class="form-group mx-auto">
                            <label>We support .pdf,.jpeg file formats and size to 5MB</label>
                        </div>
                        <div class="form-group mx-auto" id="errorMessage"></div>
                        <div class="form-group mx-auto">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            $('#uploadForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo url('/api/file-upload') ?>', 
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response); // робота з відповіддю API
                        if (response.error_description) {
                            $('#errorMessage').css('color', 'red');
                            $('#errorMessage').text(response.error_description);
                        } else {
                            $('#uploadForm').hide();
                            $('#successMessage').html(response).show();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown); // обробка інших помилок
                    }
                });
            });
        });
    </script>
</body>

</html>