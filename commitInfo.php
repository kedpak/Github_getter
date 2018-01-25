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
		/* Channges page to the commiter's github user page when picture is clicked */
		$(function (){
		  $(".pic").click(function(){
		    const profile_url = $(this).data("url");
		    window.location.replace(profile_url);
		  });
	       });
	</script>
</head>

<body>
        <!-- Header with title of page -->
	<div class="container">
	   <header class="row pg_header col-md-12 col-sm-12 col-xs-12"/>
	      <section class="header_title col-md-9 col-sm-9 col-xs-8">
	         <h1>Github Getter</h1>
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

        //sha id sent from first page
        $sha_id = $_GET["sha"];
        	
        $json = file_get_contents('https://api.github.com/repos/torvalds/linux/commits/' . $sha_id, false, $context);
        $obj = json_decode($json);
      ?>
             <!-- section for profile picture -->
            <section class="row col-md-12 col-sm-12 col-xs-12">
               <figure class="col-md-4">
                  <figcaption class="figcap"><?php print_r($obj->commit->committer->name); ?></figcaption></a>
                     <div class="Info!">
                        <div class="pic" data-url=<?php print_r($obj->author->html_url); ?>>
                           <img src=<?php print_r($obj->committer->avatar_url); ?> width="280px" height="300px"/>
                        </div>
                     </div>
                </figure>

               <!-- Section for displaying results of details for commit -->
               <figure class="col-md-6">
                  <div class="details">
                     <h3 class="files"> Files </h3>
                     <?php
                         // Loops through files array and returns details of each file
                          foreach($obj->files as $res) {
		            echo '<div class="file_details">';
                            echo "<p> FILENAME:  </p>";
                            print_r($res->filename);
		            echo "<br>";
		            echo "<p> STATUS:   </p>";
                            echo "<br>";
                            echo "<p> ADDITIONS: </p>";
                            print_r($res->additions);
                            echo "<br>";
                            echo "<p> DELETIONS: </p>";
                            print_r($res->deletions);
                            echo "<br>";
                            echo "<p> CHANGES: </p>";
                            print_r($res->changes);
		            echo '</div>';
                          }
                      ?>
                   </div>
                </figure>
             </section>
        </div>
</body>
</html>
