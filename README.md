# Introduction to the Project 
As described below, we design this project to help address Calgary Cleaning Services’ data storage and retrieval problems. Calgary Cleaning Services is a small company that relies on Excel and other physical means of storage to store its information. It was a nice and easy way to keep track of records, but their business has been experiencing a spike in demand and they need a better solution to keep track of their data as their business expands. We thought this was a great opportunity to have a hands-on experience on a real project that could be beneficial for someone.

We knew they were in need of a better solution, and we decided to create this project to address their needs. We created a fully functional website with a modern design and very good backend functionality that connects to a database to store all the data they need to keep track of. We used PHP language for a backend and CSS, jQuery and Html for the frontend (with a few other libraries that in a sense are just glorified Jquery implementation like Bootstrap). For ease of use and accessibility, we used XAMPP software to function as our local server. 
A local server was used for the development process but we also decided to use Amazon AWS to run a virtual machine and make the database and website available online.

# Project Design 
Our Website can host 3 types of main users: Admin, Customer, Cleaner, and Employee. However, Employees have 3 kinds of users: Regular Employee, Maintenance and Sales Associate. So it total there are 3 types of users.
Our design only allows Admin and customers to create accounts. Admin can create Other employees and accounts and Admins as well. Customer can only create their own account through a signup options displayed at the bottom at the form. 
Cleaners can only see the current jobs they have been assigned.

## Types of users

* As mentioned above, Admins can create other employees, as well as Update or Delete employees and View all employees grouped by their job type.

* Sale Associates can add new Services, create contracts that are linked to a customer, Delete, Update and List all the contracts currently available.

* Maintenance Associates are able to Add, Update and Delete Equipment and supplies as well as list all the equipment and supplies the company has on stock.

* Regular employees will have no privileges since these employees belong to the category of others and hence there could be may other types of employees> so we decided to focus on 3 main employees discussed above.

* Finally, customers can request to book an employee they have previously worked with. In order to make a reservation, the customer must have a unique reference code from the employee he/she wants to hire again. This request will be reviewed by a sales associate and determined if the reservation can be made. This is the only part we couldn’t fully implement due to inconsistencies with the result.



# User Manual

## Login-Page:
 
This is the homepage for our project website, which includes the Users to login as either Admin, Customer and  Employee with different account information that saves in database. The first text field allows users to choose which type to login(“Admin”, “Customers”,”Employee”).

Login email typo check: 
In the login page, we provide an email typo check for users if the format of the input email does not match the correct format of email address.

 



Fail Login Page
 
If a user information is not in the database or someone with the wrong credentials tries to log in then a proper message is displayed to let the customer know about the problem.

















Successful Login Page For Admin:
 
After input the correct password and email and click login, this is the page for admin. On the top left corner, there are 3 main functions buttons for admin users(Create Employee, View Employees, Modify Employees). On the top right corner is the logout button for user to logout and leave this page.

Page for Creating employee(login as admin):
 
 
After login as admin, one of the main functions for admin users is to create new employee in the database. If the user clicks the top left button(“Create Employee”), it will lead the user to a creating employee page. Where contain a big text field to allow admin user to input all specific details of new employees. Under this text field, the system is to be set no null text field is accepted except “mid name” text field. No null value checking, type checking(“email”, “password”), and date format checking(“Date of birth”) are applied in these pages.


Job Type
 

Under “JobType” dropdown menu, admin users can pick Job type of the current new employee(“Cleaner”,” Sales”,” Maintenance”, “Employee”). 







Successful message when creating new employee:
  
After filling up all the details in the create employee form, the website will generate a new page to show the user that the employee had been added to the database successfully.

View employee page:
 

Another function for admin users is to be able to view employees that exist in the database by categories(“Cleaner”, ”Maintenance”, ”Admin”, ”Sales”).
View Cleaner page:
 
This page shows a list of every Cleaner employee in the database with all their attributes.

View Maintenance page:
 

This page shows a list of every Maintenance employee in the database with all their attributes.

View Admin page:
 
This page shows a list of every Admin employee in the database with all their attributes.




View Sales page:
 
This page shows a list of every Sales employee in the database with all their attributes.

Modify Employee page:
 
Under the nav bar of admin page, there is another functional page with allows the admin users to modify information of every employee in the database. Update & Delete are the two main functions of the modify page.

Update Employee page:
 
This page requires the admin users to input the employees SIN which they want to modify.
No matches employee page:
 
If the admin user input the SIN that is not in the database, the website will generate an error message and show it to the user.

Valid SIN update employee page:
 
If the admin user enters a valid SIN which exist in the database, the update page will show up with all information associated with. Also a new table of detail information text field will appear below to require the admin user to enter the newest information about that SIN. 
Successful update employee pages:
 
After clicking the UPDATE button, the website will generate a message webpage to the admin user and tell them it is updated successfully.

Delete Employee page:
 
This is the delete employee pages, the admin user needs to enter the SIN of the employee who he/she wants to delete. The website will search for that SIN in the database first, if it is an existing employee, then execute the delete operation, if the SIN does not exist in the database, then generate an error message to the admin user. 

Match a search
 






Success message after deleting
 

Login as Cleaner page:
 

When a cleaner employee login, this page will generate in the browser. Similar to Admin login page with the navbar and the logout button on the top.


View Job page:
 
After clicking the view job button, the website will display all the jobs that under the login users account with all attribute details.

Sales Login Page:
 

This page is the Sales login page. When the user is a Sales employee, the website will generate this page when they login to their account. This page is similar to Admin and Cleaner page but with different navbar on the top. 
Create Service page:
 
When the sales user click “Create Service”, it will lead the user to this page where the user can add the details about the new service. All text field had been set to null checking not available(“do not accept null value”). 

Success create new service page:
 
After creating the new service, the website will generate a message to show to the user that the service had been added to the database.
Create Contract page:
 
 

This is the Create Contract page, after the sales user enter this page, it will show all contract that is in the database with foregin key ID of the Contract which is customer ID. In here the user allow to create a new contract by filling up all the details of the new contract. Once they click the create button after filling up all thess text field, the system will generate the message and tell the user it is been added to the contract database 


Successful message after creating account
 

View Contract page:
 
 If the sales user click view contract button, this page will generate by the website. In this page, the system generates all contracts in the database, and list them by all attributes displayed in the page.


Update Contract page:
 
The sales user can simply input the contract number and search the corresponding contract in the database. Then Update the Contract.
Search Contract failed page:
 
When the user is trying to search some contract ID that is not in the data base, the website will generate an error message to the user.


Search Contract success and change status page:
 
When the input contract ID is a valid ID in the database, the page will show up the details of the searched and the Update textfield to allow user to update the status of the contract. 
Delete Contract page:
 
This is the delete contract page, same format as the update contract page. The sales user needs to enter a valid contract ID to access the delete page:
 
After the user click delete button, the contract will be deleted from the database.





Successful Login Page For Customers:
 
If the users of the website login as a customer, and the user had a valid account which is existing in our database, this is the successful login page. At this stage, our page will only allows the users to reserve a specific cleaner. If the user wishes to leave the page, there is a logout button at the top right corner. 

Error checking for null reference employee number:
 

Any null input for the textfield of “Employee Reference Number” will be detected by the php code and pops up an error message window to remind the users

Error checking for input data format:
 
For any date format that is not correct, the website will pop up error message checking to remind the user to input a correct date value for this textfield.


Successful reservation create page:
 
After every input is valid and submitted. The website will generate a message on the top which shows that the request is created. 



Create Customer account page:
 
 If the customer does not have an associate account with the website, there is a create account button in the login page which allows them to create a new account in the database.
Sign-up page:
 
After customers click “Create account” button, the website will lead them to the sign up page which requires the customer to fill up the information to create the account. In the “Select Customer type” dropdown bar, we provide two customer types for the users to choose(Residential & Company). After choosing the type of customers, there will be a hidden text field shows up. Those hidden text fields are different depending on which customer type the user pick.

















Customer Signup page
  
Under these pages, the website also provide null value checking for every text field and type check checking for (Email, Phone Number, Postal Code). It also checking if two password input equals. After successful create account, the website generate a success message and brings the user back to the login page shown below:
 


Maintenance page
 
Here you have to option to check the equipment or supplies page

Equipment page
 
Here you can select to view, add, update or delete an equipment


View Equipment
 
Here you can see all the equipment currently in the inventory

Add equipment
 
Fill out the form click the add button
Success message after added equipment
 

Update Equipment page
 


Succesful search
 

Unsuccessful search
 


Delete Equipment Success
 
Delete Equipment Unsuccessful
 
Supplies Page
 
The same exact functionality applies to supplies, the pages look exactly the same and they have the same functions. 
