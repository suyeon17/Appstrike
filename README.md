# <strike> App </strike>

<div style="text-align:center"><img src ="https://imgs.xkcd.com/comics/exploits_of_a_mom.png" /></div>

## The Idea `

<strike> App </strike> is just a small class Project to test some of the most famous web vulnerabilities such as :

- SQL Injection 
- Command Injection
- File Upload

<strike> App </strike> contains two distinct Levels of security (low and high) so that you can switch between them and try new/different things.

## Ways 2 Explore it `

- Practice SQL Injection on press.php?id={XXXX} (enable low mode at the botton of the page) and try to get the admins hashed password.
- Decrypt the password using an external tool (md5 type).
- After Logging in successfuly as admin try to inject some commands inside the file name input in the backup page.
- Upload malicious Files for different reasons (server overload, command execution ..).  

## How to Setup `

the setup is very easy actually, you just need a web server (like apache) and php libs and mysql for a DB .

### Steps ``

1. create a database in mysql with a name of your choice 

2. create the necessary tables using these queries :
  ```sql
  CREATE TABLE Articles (id INT NOT NULL AUTO_INCREMENT, title VARCHAR(100) NOT NULL, text TEXT NOT NULL, login VARCHAR(40) NOT NULL, date DATE, PRIMARY KEY (id));

  CREATE TABLE Users (id INT NOT NULL AUTO_INCREMENT, login VARCHAR(40) NOT NULL, password VARCHAR(40) NOT NULL, PRIMARY KEY (id));
  
  CREATE TABLE Files (id INT NOT NULL AUTO_INCREMENT, path TEXT, article_id INT NOT NULL, PRIMARY KEY (id));
  ```

3. and then Add manually an admin so you can login to the panel space :

  ```sql
  --- '5f4dcc3b5aa765d61d8327deb882cf99' = 'password' (crypted w md5)
  INSERT INTO Users (login, password) VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99');
  ```

4. after downloading and setting the app folder open /backend/pdo.php and edit mysql global vars :
  ```php
  <?php

  // Define configuration
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "XXXXXX");
  define("DB_NAME", "app");

  ?>
  ```

That's it :)  

