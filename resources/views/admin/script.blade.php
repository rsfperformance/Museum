<script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- apexcharts -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="/assets/js/app.js"></script>

        <script src="/assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- ckeditor -->
        {{-- <script src="/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> --}}

        <!--tinymce js-->
        <script src="/assets/libs/tinymce/tinymce.min.js"></script>

        <!-- init js -->
        <script src="/assets/js/pages/form-editor.init.js"></script>

        {{-- @foreach(\App\Lang::all() as $data)
        <script>
                ClassicEditor
                .create( document.querySelector( '#classic-editor{{ $data->prefix }}' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        @endforeach --}}

        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>    
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        </script>

        {{-- Useful ckeditor --}}
        <script>
            CKEDITOR.replace('my-editor', options);
        </script>
        @foreach(App\Useful::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}', options);
        </script>
        @endforeach

        {{-- Family ckeditor --}}
        @foreach(App\lang::all() as $data)
            @for($i=1; $i<=6; $i++)
                <script>
                    CKEDITOR.replace('my-editor{{ $i }}{{ $data->prefix }}', options);
                </script>
            @endfor
        @endforeach
        
        @foreach(App\Family::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}1', options);
        </script>
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}2', options);
        </script>
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}3', options);
        </script>
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}4', options);
        </script>
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}5', options);
        </script>
        <script>
            CKEDITOR.replace('my-editor{{ $data->id }}{{ $data->lang }}6', options);
        </script>
        @endforeach

        {{-- Useful ckeditor --}}
        @foreach(App\lang::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->prefix }}', options);
        </script>
        @endforeach

        @foreach(App\lang::all() as $data)
        @for($i=1; $i<=6; $i++)
            <script>
                CKEDITOR.replace('my-editor{{ $data->prefix }}{{ $i }}', options);
            </script>
        
        @endfor
        @endforeach

        {{-- Quote ckeditor --}}
        @foreach(App\Quote::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->lang }}{{ $data->id }}', options);
        </script>
        @endforeach

        @foreach(App\Lang::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->lang }}', options);
        </script>
        @endforeach

        {{-- Familyform ckeditor --}}
        @foreach(App\Lang::all() as $data)
        <script>
            CKEDITOR.replace('my-editor{{ $data->prefix }}', options);
        </script>

        @for($i=1; $i<=5; $i++)
            <script>
                CKEDITOR.replace('my-editor{{ $data->prefix }}{{ $i }}', options);
            </script>
        
        @endfor
        @endforeach

         <!-- Table Editable plugin -->
         <script src="/assets/libs/table-edits/build/table-edits.min.js"></script>
         <script src="/assets/js/pages/table-editable.int.js"></script> 


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    

    <script>

        $(".save-data").click(function(event){
            event.preventDefault();
      
            let name = $("input[name=name]").val();
            let email = $("input[name=email]").val();
            let mobile_number = $("input[name=mobile_number]").val();
            let message = $("input[name=message]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
      
            $.ajax({
              url: "/ajax-request",
              type:"POST",
              data:{
                name:name,
                email:email,
                mobile_number:mobile_number,
                message:message,
                _token: _token
              },
              success:function(response){
                console.log(response);
                if(response) {
                  $('.success').text(response.success);
                  $("#ajaxform")[0].reset();
                }
              },
              error: function(error) {
               console.log(error);
              }
             });
        });
      </script>


        
        

