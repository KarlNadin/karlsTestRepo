# User Authentication and Sessions

* Put the xyz website on a server, open the website in a browser, check you can navigate around the site. 
* *login.php* features a login form. When submitted this takes the user to *login_process.php*.

1. In *login_process.php* add some code that will test the user's username and password using a simple if statement. If the user enters a username of ‘testuser’ and password of ‘letmein’ they should receive a message telling them they are correct

2. Using sessions can you protect the rest of the website so that only authenticated users can access the pages. 
  * In *login_process.php*, if the user successfully logs in, set a session variable e.g. 
   ```php
    $_SESSION["username"]="testuser"; 
   ```
  * In each of the website pages test to see if this variable has been set
     * If it has display a message saying ‘logged in as testuser’
     * If it hasn’t been set 
       * Don’t display the page contents
       * Instead display a hyperlink back to the login form

3. Create a page called *logout.php*
   * This should destroy the session and provide a link back to the login form

4.	Now think about how you can use URL redirection so that users are automatically re-directed to the appropriate page instead of having to click on hyperlinks.

5.	A login system with a hard-coded username and password isn’t very useful. How can you change the above so that the usernames and passwords are stored in a database table and SQL queries are used to test the username and password? 

6. Think about how you can hash the passwords to make the data more secure. Try using the password_hash() (http://php.net/manual/en/function.password-hash.php) and password_verify() (http://php.net/manual/en/function.password-verify.php) functions.

7. Try to create a registration form. A simple example should be fairly straight forward to implement. Think about how you can make sure no two users share the same username. 

