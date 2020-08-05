<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body background="../background2.png">

    <div class="container">
        <br />
        <h3 align="center">Ajax File Upload Progress Bar using PHP JQuery</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading"><b>Ajax File Upload Progress Bar using PHP JQuery</b></div>
            <div class="panel-body">
                <form id="uploadImage" action="upload2.php" method="post">
                    <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                    </div>
                    <div class="form-group">
                        <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="targetLayer" style="display:none;"></div>
                </form>
                <div id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#uploadImage').submit(function(event) {
                if ($('#uploadFile').val()) {
                    event.preventDefault();
                    $('#loader-icon').show();
                    $('#targetLayer').hide();
                    $(this).ajaxSubmit({
                        target: '#targetLayer',
                        beforeSubmit: function() {
                            $('.progress-bar').width('50%');
                        },
                        uploadProgress: function(event, position, total, percentageComplete) {
                            $('.progress-bar').animate({
                                width: percentageComplete + '%'
                            }, {
                                duration: 1000
                            });
                        },
                        success: function() {
                            $('#loader-icon').hide();
                            $('#targetLayer').show();
                        },
                        resetForm: true
                    });
                }
                return false;
            });
        });
    </script>
</body>

</html>