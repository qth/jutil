<html>
<head>
<style>
body{
  background: url(background.jpg) no-repeat center center fixed;
  background-size: cover;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
}
h1{
  color: white;
  text-align: right;
  font-style: italic;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
h3{
  color: white;
  text-align: right;
  font-style: italic;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}
p{
  color: white;
}
</style>
</head>
<body>
<h1><?php print gethostname(); ?></h1>
<h3><?php
$grace = 300;
$now = 3600;
$diff = 0;
$contents = array();
$contents['USEC'] = 0;
$load = sys_getloadavg();
$response = "System up; load averages: $load[0] | $load[1] | $load[2]\n";
if ( file_exists ( "/var/run/systemd/shutdown/scheduled" ) ) {
   $contents = parse_ini_file ( "/var/run/systemd/shutdown/scheduled" );
   #print_r ($contents);
   $now = date("U");
   $diff = ( round ( $contents['USEC'] / 1000000 ) ) - $now;
   $response = "System rebooting in $diff seconds\n";
   if ( ( 0 < $diff) && ( $diff < $grace ) ) {
      http_response_code(503);
   } else {
      http_response_code(200);
   }
} else {
   http_response_code(200);
}
print $response;
?></h3>
</body>
</html>
