       <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalLong">
           Start Upload
       </button>

       <!-- Modal -->
       <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLongTitle">Upload your files here:</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="row">
                           <div class="col-12">
                               <div class="card">
                                   <div class="card-body">
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
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Підключення бібліотеки jQuery з CDN -->
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

       <!-- Підключення JS Bootstrap з CDN -->
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
       </div>
       </div>