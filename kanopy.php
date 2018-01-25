<!DOCTYPE html>
<html>

<head>
	<title>Kanopy</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	      integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
	  /* jQuery method which utilizes click event to change page and save sha of specific commit clicked on
	       and post to the next page */
            //contentType: "application/json; charset=utf-8",
	   $(function (){
              $(".commit").on('click',function(){
	        const sha_id = $(this).data("sha");
	        window.location.replace("commitInfo.php?sha=" + sha_id ); 
              });
           });
         </script>
</head>

<body>
         <!-- Tile of page -->
	<div class="container">
	   <header class="row pg_header col-md-12 col-sm-12 col-xs-12"/>
	      <section class="header_title col-md-9 col-sm-9 col-xs-8">
	         <h1>Github Grabber</h1>
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
        $json = file_get_contents('https://api.github.com/repos/torvalds/linux/commits?since=2016-11-01T00:00:00Z', false, $context);
        $obj = json_decode($json);

        // Create components and displays *important* data from each commit
        for($i=0; $i<sizeof($obj); $i++) {
          echo '<section class="row col-md-12 col-sm-12 col-xs-12">
		<figure class="col-md-6" id="figure1">
                <figcaption class="figcap">Commit</figcaption></a>
                <div class="commit" data-sha=' . $obj[$i]->sha . '>';
                 // This grabs important details and displays them on to pages
                  print_r($obj[$i]->commit->author->name);
                  echo '<br>';
                  print_r($obj[$i]->commit->author->email);
                  echo '<br>';
                  print_r($obj[$i]->commit->author->date);
                  echo '<br>';
                  echo '<br>';
                  echo 'Commit message: ';
                  echo '<br>';
                  print_r($obj[$i]->commit->message);

          echo  '</div>
                </figure>
                <figure class="col-md-4">
                </section>';
         }
    ?>
    </div>
</body>
</html>
