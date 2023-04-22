<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
{{--<script>--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<script>
    $(document).ready(function(){

        //todo:image preview
        $(document).on('change','#image', function() {
            $('.error_success_msg_container').html('');
            if (this.files && this.files[0]) {
                let img = document.querySelector('.image_preview');
                img.onload = () =>{
                    URL.revokeObjectURL(img.src);
                }
                img.src = URL.createObjectURL(this.files[0]);
                document.querySelector(".image_preview").files = this.files;
            }
        });

        //todo:update image
        $(document).on('submit','#image_upload_form',function(e){
            e.preventDefault();
            // var data = {
            //     _token: $('meta[name="csrf-token"]').val(),
            //
            // };
            let form_data = new FormData(this);
            $.ajax({
                url:"causes/store",
                method:'post',
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $('.error_success_msg_container').html('');
                    $('.image_preview').hide();
                    if(res.status=='success'){
                        $('.error_success_msg_container').html('<p class="text-success">Image Successfully Uploaded</p>');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error_success_msg_container').html('');
                    $.each(error.errors, function (index, value) {
                        $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
                    });
                }

            });

        });
    })
</script>

