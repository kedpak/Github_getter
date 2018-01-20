# Kanopy Project

# Approach

My approach for this project was to build a basic functioning application utilzing PHP. Because I am new to PHP, my priority was to have an end product which works and not focus on using any frameworks. I decided early on that obtaining the correct data was important. Therefore, I spent time familiarizing myself with the Gitub API and its structure. Once I understood how to collect the data that was necessary, I took the steps to bring the application together. 

Key ideas to plan:
* How I should display the data onto the page.
* Think about what is 'important' commit information.
* Which specific details of a commit should I display on the inital page?
* Which specific details of a commit should I display on the second page?
* How much time should I spend on the user interface?
* How much of my time should I focus on the UI?
* How I should manage my time in general.

# Installation and instructions

* Fork or clone the repository
* cd in to /kanopy direcory
* If running on mac os start apache server with command 'sudo apachectl start'
* If running on windows go this link for instructions to setup apache server[setup](https://www.tutorialrepublic.com/php-tutorial/php-get-started.php)
* Inside the browser go to 'http://localhost/kanopy/kanopy.php'
* Click on a commit and user will be taken see more commit details of commit selected (this still is buggy)
* Click on profile picture to be taken to user's github 

# To Improve

* The number one issue I must fix is the ajax request to post the sha id of the clicked on commit to be posted to the second page. I was not able to solve an issue I was facing where when the user clicks on a specific commit, the details of that commit should appear on the second page. I was struggling with how to convert jQuery variable into PHP variables and vice versa. I would like to focus more time on how the relationship between jQuery and PHP can be utilized. I was planning on using the sha-id of the commit selected, by appending the sha-id to the uri of the request on the second page to receive specific information about the commit.

The following code was to make the post request using ajax
```
 $(function (){
    $(".commit").click(function(){
        const sha_id = $(this).data("sha");
        $.ajax({
            url : 'commitInfo.php',
            type : 'POST',
            data : {sha_id: sha_id},
            contentType: "application/json; charset=utf-8",
            success: function(response){
                console.log(sha_id);
                window.location.replace("commitInfo");
            }
        });    
    });
});
```

The above code should send a specific sha id, which will be appended to the end of the uri of the curl request to grab the specific data to be displayed. However it does not work.

On the other page, I attempt to grab the sha id with the following code:

`var_dump($_POST['sha_id']);`

However, it returns NULL or undefined.


* I would improve the user interface to look a more sleek and modern style.* 


