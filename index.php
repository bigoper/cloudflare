<?php
if (!function_exists('getallheaders'))
{
        function getallheaders()
        {
                     $headers = '';
             foreach ($_SERVER as $name => $value)
             {
                     if (substr($name, 0, 5) == 'HTTP_')
                     {
                             $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                     }
             }
             return $headers;
        }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
                <h1>Cloudflare.com</h1>
                <p>This is a tester page for cloudflare services</p>
                <p><?php //var_dump($_SERVER); ?></p>
                <div class="row">
                        <div class="col-lg-12">

                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Header</th>
                                      <th>Value</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <?php
					$server_headers = $_SERVER;
                                        foreach ($_SERVER as $name => $value) {
                                            echo "<tr><td>$name</td><td>$value</td></tr>";
                                        }

                                    	//Additional headers
                                    	//echo "<tr><td>HTTP_CF_CONNECTING_IP</td><td>".$_SERVER['HTTP_CF_CONNECTING_IP']."</td></tr>";
                                    	//echo "<tr><td>REMOTE_ADDR</td><td>".$_SERVER['REMOTE_ADDR']."</td></tr>";
                                    	//echo "<tr><td>HTTP_CF_IPCOUNTRY</td><td>".$_SERVER['HTTP_CF_IPCOUNTRY']."</td></tr>";                                 
                                        ?>
                                 </tbody>
                                </table>
                        </div>
                </div>
        </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
