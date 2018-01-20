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
        $("#pic").click(function(){
        window.location.replace(<?php print_r($obj->commiter->html_url)?>);
      });
    });
  </script>
</head>

<body>
	<div class="container">
		<header class="row pg_header col-md-12 col-sm-12 col-xs-12"/>
			<section class="header_title col-md-9 col-sm-9 col-xs-8">
				<h1>Kanopy Project</h1>
				<p>Details about commit</p>
			</section>
		</header>

		<div class="row page_title col-md-12 col-sm-12 col-xs-12">
			<h2 id="btn">Information about commit</h2>
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
        $json = file_get_contents('https://api.github.com/repos/torvalds/linux/commits/master', false, $context);
        $obj = json_decode($json);
      ?>
      <section class="row col-md-12 col-sm-12 col-xs-12">
          <figure class="col-md-4">
            <figcaption class="figcap">Profile!</figcaption></a>
            <div class="Info!">
              <div class="pic">
                <img src=<?php print_r($obj->committer->avatar_url) ?> width="280px" height="300px"/>
              </div>

            </div>
          </figure>

          <figure class="col-md-4">
            <div class="details">
              <h3 class="files"> Files </h3>
              <div class="file_details">
                  <?php
                    // Loops through files array and returns
                    // details of each file
                    foreach($obj->files as $res) {
                      echo "<p> FILENAME:  </p>";
                      print_r($res->filename);
                      echo "<br>";
                      echo "<p> ADDITIONS: </p>";
                      print_r($res->additions);
                      echo "<br>";
                      echo "<p> DELETIONS: </p>";
                      print_r($res->deletions);
                      echo "<br>";
                      echo "<p> CHANGES: </p>";
                      print_r($res->changes);
                    }
                  ?>
              </div>
          </div>
          </figure>
      </section>
	</div>
</body>
</html>