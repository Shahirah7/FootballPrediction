# Football Prediction Game

## Objectives

* Improve knowledge of PHP scripting language
* Learn how to use an MVC (Model-View-Controller) Framework
* Explore a variety of object oriented design patterns (e.g. Factory, Singleton, Facade and Database related patterns).
* Gain a basic understanding of Linux server operations (deploying a web application, provisioning the LAMP stack).
* Practice using version control system

## Description of project
 
A football prediction game which allows users to be able to make predictions each weekend based on who they think will that week in the Premier League. Winners then proceed to the next round in which they pick another team which they have not previously chosen. This carries on each round till there is only one user left, which is then declared the overall winner. 

Users who have lost a round can also join another game to play against users who were also eliminted.

## Solution

Built a web application with authentication to allow users to register accounts and login to view protected pages. Application was built using Laravel, one of the more popular PHP web frameworks.

During the process of building this application, I learned how to use the Artisan command line tool, I learned about how the model-view-controller patterns works in the context of web applications. I also taught myself how to use blade templating and the Eloquent ORM.

I created an interface to allow users to join games, make predictions and view an plethora of statistics and game information. The front end was implemented using HTML5, I chose the Bootstrap CSS framework to allow me to rapidly prototype my interface. There is also a sprinkling of Javascript to add extra functionality to the interface.

As well as creating a data model for the game, I created the models and business logic for implementing the prediction game. This involved creating command line scripts (in PHP) that would then be executed from a CRON script or called through the web application to process rounds, deal with eliminations and create new games.

Lastly I created an admin application to allow for managing instances of the game.
