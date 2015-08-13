<?php

require_once 'text.php';
$reg = new text();
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>SMSer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600' rel='stylesheet'>

    <style>

        body {
            padding-top: 20px;
            font-size: 16px;
            font-family: "Open Sans",serif;
        }

        h1 {
            font-family: "Abel", Arial, sans-serif;
            font-weight: 400;
            font-size: 40px;
        }

        .margin-base-vertical {
            margin: 40px 0;
        }

    </style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1 class="margin-base-vertical">SMSer</h1>

                <p>
                    Sign up to be notified by text message.
                </p>
<!--   -->
                <form method="post" action="" class="margin-base-vertical">
                    <p class="input-group">
                        <span class="input-group-addon"><span class="fa fa-envelope fa-5x"></span>  </span>
                       <input type="text" class="form-control input-lg" name="first" placeholder="Albert" required >
                       <input type="text" class="form-control input-lg" name="last" placeholder="Einstein" required >
                        <select class="form-control input-lg" name="carrier" id="carrier" required>
                            <option value="--">--</option>
                            <option value="att">AT&T</option>
                            <option value="cspire">C-Spire</option>
                            <option value="sprint">Sprint</option>
                            <option value="verizon">Verizon</option>
                        </select>
                       <input  type='tel' pattern='^\d{3}\d{3}\d{4}$' title='Phone Number (Format: 012345678)' class="form-control input-lg" name="number" placeholder="0123456789" required />
                        <span class="input-group-addon"></span>
                    </p>
                    <p class="help-block text-center"><small>We won't send you spam. Unsubscribe at any time.</small></p>
                    <p class="text-center">
                        <button type="submit" name="submit" class="btn btn-success btn-lg text">Keep me posted</button>
                    </p>
                    </span>
                </form>

                    <?php $reg->registerUser(); ?>

                <p class="text-center">
                    Bootstrap Landing Page courtesy of <a href="http://www.williamghelfi.com/blog/2013/08/04/bootstrap-in-practice-a-landing-page/">William Ghelfi</a>
                </p>

            </div>
        </div>
    </div>



<script type="">
    $('.text').click(function() {
        var time = $(this).val();
        $.ajax({
                type: "POST",
                url: "text.php",
                data: {submit: time}
              });
    }
</script>

</body>
</html>
