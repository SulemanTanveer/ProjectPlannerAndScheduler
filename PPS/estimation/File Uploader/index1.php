<!doctype html>
<head>
    <title>  Multiple File Upload using PHP, JQuery & Ajax : Devzone.co.in</title>
    <script src="jquery.js"></script>
    <script src="jquery.form.js"></script>
   

    <script>
        /* JS for Uploader */
        $(function() {
            /* Append More Input Files */
            $('#anc_add_more').click(function() {
                $('#spn_inputs').append('<input type="file" name="myfile[]" multiple><br>');
            });
        });

    </script>
</head>
<body>
    

        <div class="content">
          
            <div id='dv1'>

                <div class="dv_add">  <a href="javascript:void(0);" id="anc_add_more">Add More File</a></div>
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>    
                <div id="status"></div>
                <form action="file.php" method="post" id='frm_upld' enctype="multipart/form-data">
                    <span id='spn_inputs'> 
                        <input type="file" name="myfile[]" multiple><br>
                      
                    </span>
                    <input type="submit"   value="Upload File(s)">
                </form>
                <script>/* JS for Uploader */
                    (function() {

                        var bar = $('.bar');
                        var percent = $('.percent');
                        var status = $('#status');

                        $('form').ajaxForm({
                            beforeSend: function() {
                                status.empty();
                                var percentVal = '0%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal)
                                percent.html(percentVal);

                            },
                            success: function() {
                                var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            complete: function(xhr) {
                                status.html(xhr.responseText);
                            }
                        });
                    })();
                </script>
            </div>
        </div></div>
</body>


</html>