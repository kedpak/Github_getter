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
* Inside the browser got to 'http://localhost/kanopy/kanopy.php'
* Click on a commit and user will be taken see more commit details of commit selected (this still is bugged)

# To Improve

* The number one issue I would fix if given more time would be the post request to obtain the sha-id from the second page to the first. I was not able to solve an issue I was facing where when the user clicks on a specific commit, the details of that commit should appear on the second page. I was struggling with how to convert jQuery variable into PHP variables and vice versa. I would like to focus more time on how the relationship between jQuery and PHP can be utilized. I was planning on using the sha-id of the commit selected on the second page, by appending the sha-id to the uri of the request on the second page to receive specific information about the commit.

* I would improve the user interface to look a more sleek and modern style.* 


