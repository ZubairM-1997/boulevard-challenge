## Boulevard Online Code Challenge

This project was completed with Laravel, PHP Unit and MySQL.

## Brief
Create a Laravel application and write a solution to import the given product data ( products.csv ) into
its database. You'll need to write migrations with a sensible database structure along with the importer. No
front end is required.

How the file is provided to the application is up to you. For example, you could write an artisan command
for it or create a very basic file uploader.

Things we might be looking for:
Usage of composer / community packages
Migrations / database design
Logging of errors
Ability to handle empty, malformed, or extremely large files
Potential to accept different file formats, i.e JSON or XML
Documentation
Validation
Testing
OOP / SOLID principles

Ideas for talking about your work:
Quick demo
Show us your planning, even if it's a few scribbles on a post it note.
How you might test it
Any problems you faced
Future improvements

## Getting started with the project
1) fork this repository then clone it to your local
2) go to the .env file and ensure the correct database connection configuration is set up
3) Install the dependancies by entering the command 'composer install'
4) Run the migrations with this command 'php artisan migrate'
5) Start the server with this command 'php artisan server start'
6) Server should start on the relevant port, depending on your configuration, for me it was http://127.0.0.1:8001/
7) To run the tests, enter the command 'php artisan test'

## Database design
This was a simple dataset, so only one table called Products was needed in the database

## Error Handling
I thought about what if the user uploaded incorrect file formats, the appropriate response would be a 406 response if that event did occur, as those actions should not be allowed. Then, the appropriate views are sent back to the user, showing what they did wrong.

## Testing
For testing, I used PHPUnit, as it was inbuilt with Laravel, simple to use, lightweight.

![](demo.gif)

## Challenges
For me, this was the first time I had used Laravel, so the first challenge was setting up and ensuring the project was connected to the database was something I was stuck on for a couple of hours. However, the layout of the controllers seemed very similar to what I experienced with Ruby on Rails, so understanding how it operated was not too much of a struggle.

Another challenge I faced was I kept on getting this error when I ran the tests
`/usr/bin/php declares an invalid value for PHP_VERSION
This breaks fundamental functionality such as version_compare()
Please use a different PHP interpreter`

Seemed like the version of PHP I was using at the time was not compatible with the version of PHPUnit for this project, how I resolved this was to upgrade my PHP version locally by entering the commmand 'brew upgrade php', if you come across this issue, make sure you have the latest version of homebrew installed.

## Tests
There are 4 test cases
1) Checking if there is no file submitted in the form
2) Checking if there is a csv file submitted but it has incorrect formatting
3) Checking if an incorrect file type is submitted (jpeg, pdf, etc)
4) Checking if the import page is rendered correctly

## Thoughts on Improvements
These are things that I could have improved on given I had enough time, I thought of these from a UX/UI and functionality perspective

1) Including a positive test case to check if csv file with correct formatting is submitted
2) JavaScript form validation that shows a pop up on the browser that tells user to import a file before submitting it
3) CSS to make the project look more appealing to the eye
4) More validation to accept xml and json documents with correct formatting in the controller, currently it only accepts products.csv, ideally the code can be reformatted to accept products.json or products.xml, the more flexible the better
5) Integrating Maatwebsite library somehow, watched a couple tutorials, seemed like the library added more functionality when dealing with csv imports, seemed pretty cool.















