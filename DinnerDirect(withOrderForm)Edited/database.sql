DROP DATABASE IF EXISTS dinnersdirect;
CREATE DATABASE dinnersdirect;
USE dinnersdirect;

CREATE TABLE schools (
                    schoolID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                    schoolname text,
                    PRIMARY KEY(schoolID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO schools (schoolID, schoolname) VALUES
(1, 'UCL'),
(2, 'Imperial'),
(3, 'Kings College London'),
(4, 'Oxbridge');



CREATE TABLE customers (
                    customerID int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    first_name varchar(100) NOT NULL,
                    last_name varchar(100) NOT NULL,
                    schoolID int(10) UNSIGNED NOT NULL,
                    email text NOT NULL,
                    password text NOT NULL,
                    PRIMARY KEY(customerID),
                    FOREIGN KEY(schoolID) REFERENCES schools(schoolID) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO customers (customerID, first_name, last_name, schoolID, email, password) VALUES
(1, 'louis', 'nguyen', 1, 'banter@ucl.ac.uk', 'UCLove'),
(3, 'Carla', 'Griffiths', 2, 'carla.griffiths@gmail.com', 'carlloves');



CREATE TABLE drivers (
                                 driverID int(10) UNSIGNED NOT NULL,
                                 first_name varchar(100) NOT NULL,
                                 last_name varchar(100) NOT NULL,
                                 phonenumber varchar(100) NOT NULL,
                                 email text NOT NULL,
                                 password text NOT NULL,
                                 PRIMARY KEY(driverID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO drivers (driverID, first_name, last_name, phonenumber, email, password) VALUES
(1, 'carl', 'griffiths', '12', 'carla.griffiths@gmail.com', 'test2019');



CREATE TABLE mealdeal (
                    ID int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    name text NOT NULL,
                    code text NOT NULL,
                    price double(10,2) UNSIGNED NOT NULL,
                    image text,
                    description text NOT NULL,
#                     last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY(ID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO mealdeal (ID, name, code, price, image, description) VALUES
(1, 'Set A', 'WE7654', 7, 'img/menuimages/pic1.jpg', 'This set has spaghetti and a coke'),
(2, 'Set B', 'WE7652', 7, 'img/menuimages/pic8.jpg', 'This is a chicken wrap with a salad side'),
(3, 'Set C', 'WE7658', 9, 'img/menuimages/pic8.jpg', 'This has 9 pieces of chicken wings coated with garlic soy sauce and comes with fries and a coke'),
(4, 'Set D', 'TH647', 4, 'img/menuimages/pic6.jpg', 'This meal comes with fresh sushi and coke.'),
(5, 'Set E', 'ET567', 5, 'img/menuimages/pic9.jpg', 'Crispy fried chicken with a cup of coffee.'),
(6, 'Set F', 'UF576', 6, 'img/menuimages/pic4.jpg', 'Simple meal, bread and eggs.');



CREATE TABLE orderlist (
                            order_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                            customer_id int(10) UNSIGNED NOT NULL,
                            school_id int(10) UNSIGNED NOT NULL,
                            driver_id int(10) UNSIGNED,
                            time_date date NOT NULL,
                            price double(10,2) UNSIGNED,
                            order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
                            PRIMARY KEY(order_id),
                            FOREIGN KEY(customer_id) REFERENCES customers(customerID) ON DELETE RESTRICT ON UPDATE CASCADE,
                            FOREIGN KEY(school_id) REFERENCES schools(schoolID) ON DELETE RESTRICT ON UPDATE CASCADE,
                            FOREIGN KEY(driver_id) REFERENCES drivers(driverID) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE orderitem (
                                 order_id int(10) UNSIGNED NOT NULL,
                                 item_id int(10) UNSIGNED NOT NULL,
                                 quantity int(2) UNSIGNED NOT NULL,
                                 last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
                                 PRIMARY KEY(order_id, item_id),
                                 FOREIGN KEY(order_id) REFERENCES orderlist(order_id) ON DELETE RESTRICT ON UPDATE CASCADE,
                                 FOREIGN KEY(item_id) REFERENCES mealdeal(ID) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



