<!DOCTYPE html>
<html>

<head>
	<title>Kanopy</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
  <script type="text/javascript"
  src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $(".commit").click(function(){
        window.location.replace("commitInfo");
        });
      });
  </script>
</head>

<body>
	<div class="container">
		<header class="row pg_header col-md-12 col-sm-12 col-xs-12"/>
			<section class="header_title col-md-9 col-sm-9 col-xs-8">
				<h1>Kanopy Project</h1>
				<p>List commits from Linux repo</p>
			</section>
		</header>

		<div class="row page_title col-md-12 col-sm-12 col-xs-12">
			<h2>List of commits in Linux repository</h2>
	  </div>

    <?php
        //Send UserAgent header to be allowed access to Github api
        $opts = [
            'http' => [
              'method' => 'GET',
              'header' => [
                  'User-Agent: PHP'
                ]
            ]
        ];

        $context = stream_context_create($opts);
        // Get data from github API
        // User: torvalds
        // repo: linux
        // branch: default(master)
        $json = file_get_contents('https://api.github.com/repos/torvalds/linux/commits/ec835f8104a21f4d4eeb9d316ee71d2b4a7f00de', false, $context);
        $obj = json_decode($json);

      ?>


    	<section class="row col-md-12 col-sm-12 col-xs-12">
    			<figure class="col-md-4">
            <figcaption class="figcap">Commit</figcaption></a>
            <div class="commit">
              <?php
                // This grabs important details and displays them on to pages
                print_r($obj->commit->author->name);
                echo '<br>';
                print_r($obj->commit->author->email);
                echo '<br>';
                print_r($obj->commit->author->date);
                echo '<br>';
                echo '<br>';
                echo 'Commit message: ';
                echo '<br>';
                print_r($obj->commit->message);
              ?>
            </div>
    			</figure>
    		<figure class="col-md-4">
	</div>
</body>
</html>
