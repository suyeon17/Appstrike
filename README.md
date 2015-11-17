# <strike> App </strike>

## Setup :

- create a database in mysql with a name of your choice 

- create the necessary tables using these queries :
```sql
CREATE TABLE Articles (id INT NOT NULL AUTO_INCREMENT, title VARCHAR(100) NOT NULL, text TEXT NOT NULL, login VARCHAR(40) NOT NULL, date DATE, PRIMARY KEY (id));

CREATE TABLE Users (id INT NOT NULL AUTO_INCREMENT, login VARCHAR(40) NOT NULL, password VARCHAR(40) NOT NULL, PRIMARY KEY (id));
  
CREATE TABLE Files (id INT NOT NULL AUTO_INCREMENT, path TEXT, article_id INT NOT NULL, PRIMARY KEY (id));
```

- and then Add manually an admin so you can login to the panel space :

```sql
--- '5f4dcc3b5aa765d61d8327deb882cf99' = 'password' (crypted w md5)
INSERT INTO Users (login, password) VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99');
```

- after downloading and setting the app folder open /backend/pdo.php and edit mysql global vars :
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

