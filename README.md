# Introduction to the Project 
As described below, we design this project to help address Calgary Cleaning Services’ data storage and retrieval problems. Calgary Cleaning Services is a small company that relies on Excel and other physical means of storage to store its information. It was a nice and easy way to keep track of records, but their business has been experiencing a spike in demand and they need a better solution to keep track of their data as their business expands. We thought this was a great opportunity to have a hands-on experience on a real project that could be beneficial for someone.

We knew they were in need of a better solution, and we decided to create this project to address their needs. We created a fully functional website with a modern design and very good backend functionality that connects to a database to store all the data they need to keep track of. We used PHP language for a backend and CSS, jQuery and Html for the frontend (with a few other libraries that in a sense are just glorified Jquery implementation like Bootstrap). For ease of use and accessibility, we used XAMPP software to function as our local server. 
A local server was used for the development process but we also decided to use Amazon AWS to run a virtual machine and make the database and website available online.

# Project Design 
Our Website can host 3 types of main users: Admin, Customer, Cleaner, and Employee. However, Employees have 3 kinds of users: Regular Employee, Maintenance and Sales Associate. So it total there are 3 types of users.
Our design only allows Admin and customers to create accounts. Admin can create Other employees and accounts and Admins as well. Customer can only create their own account through signup options displayed at the bottom at the form. 
Cleaners can only see the current jobs they have been assigned.

## Types of users

* As mentioned above, Admins can create other employees, as well as Update or Delete employees and View all employees grouped by their job type.

* Sale Associates can add new Services, create contracts that are linked to a customer, Delete, Update and List all the contracts currently available.

* Maintenance Associates are able to Add, Update and Delete Equipment and supplies as well as list all the equipment and supplies the company has on stock.

* Regular employees will have no privileges since these employees belong to the category of others and hence there could be may other types of employees> so we decided to focus on 3 main employees discussed above.

* Finally, customers can request to book an employee they have previously worked with. In order to make a reservation, the customer must have a unique reference code from the employee he/she wants to hire again. This request will be reviewed by a sales associate and determined if the reservation can be made. This is the only part we couldn’t fully implement due to inconsistencies with the result.



# User Manual

## Login-Page:
 
![image](https://user-images.githubusercontent.com/20519640/74865369-42961100-530e-11ea-9d53-089c425690f0.png)

This is the homepage for our project website, which allows the Users to log in as either Admin, Customer, and  Employee with different account information that saves in database. The first text field allows users to choose which type to login(“Admin”, “Customers”, ” Employee”).

### Login email typo check: 
![image](https://user-images.githubusercontent.com/20519640/74865392-4c1f7900-530e-11ea-8675-7ac06bd3577f.png)

In the login page, we provide an email typo check for users if the format of the input email does not match the correct format of an email address.

### Fail Login Page
 
![image](https://user-images.githubusercontent.com/20519640/74865411-50e42d00-530e-11ea-97cc-7f9ac46b19ca.png)

If a user information is not in the database or someone with the wrong credentials tries to log in then a proper message is displayed to let the customer know about the problem.


## Successful Login Page For Admin:
 
![image](https://user-images.githubusercontent.com/20519640/74865440-593c6800-530e-11ea-9439-35bebd116377.png)

After input the correct password and email and click login, this is the page for admin. On the top left corner, there are 3 main functions buttons for admin users(Create Employee, View Employees, Modify Employees). On the top right corner is the logout button for user to logout and leave this page.

### Page for Creating employee(login as admin):
 
![image](https://user-images.githubusercontent.com/20519640/74865470-622d3980-530e-11ea-8764-b7be7f05a5eb.png)
![image](https://user-images.githubusercontent.com/20519640/74865487-68231a80-530e-11ea-82b5-5ba534378a1d.png)


After login as admin, one of the main functions for admin users is to create a new employee in the database. If the user clicks the top-left button(“Create Employee”), it will lead the user to a creating employee page. Where contain a big text field to allow admin user to input all specific details of new employees. Under this text field, the system is to be set no null text field is accepted except the “mid name” text field. No null value checking, type checking(“email”, “password”), and date format checking(“Date of birth”) are applied in these pages.


### Job Type
![image](https://user-images.githubusercontent.com/20519640/74865501-6eb19200-530e-11ea-99c9-09beef567203.png)

Under “JobType” dropdown menu, admin users can pick Job type of the current new employee(“Cleaner”,” Sales”,” Maintenance”, “Employee”). 



### Successful message when creating a new employee:
  
![image](https://user-images.githubusercontent.com/20519640/74865521-77a26380-530e-11ea-8a99-96241d563c81.png)

After filling up all the details in the create employee form, the website will generate a new page to show the user that the employee had been added to the database successfully.

### View employee page:
![image](https://user-images.githubusercontent.com/20519640/74865530-7c671780-530e-11ea-9998-b469651b3538.png)

Another function for admin users is to be able to view employees that exist in the database by categories(“Cleaner”, ”Maintenance”, ”Admin”, ”Sales”).

### View Cleaner page:
![image](https://user-images.githubusercontent.com/20519640/74865544-81c46200-530e-11ea-9a99-67ae386e4c3d.png)

This page shows a list of every Cleaner employee in the database with all their attributes.

### View Maintenance page:
![image](https://user-images.githubusercontent.com/20519640/74865554-85f07f80-530e-11ea-8eb2-6700eee584ca.png)

This page shows a list of every Maintenance employee in the database with all their attributes.

### View Admin page:
![image](https://user-images.githubusercontent.com/20519640/74865564-8ab53380-530e-11ea-9302-2b781782c907.png)

This page shows a list of every Admin employee in the database with all their attributes.


### View Sales page:
![image](https://user-images.githubusercontent.com/20519640/74865589-943e9b80-530e-11ea-876c-df591bddaf98.png)

This page shows a list of every Sales employee in the database with all their attributes.

### Modify Employee page:
![image](https://user-images.githubusercontent.com/20519640/74865602-9e609a00-530e-11ea-8486-d5956597460b.png)

Under the navbar of the admin page, there is another functional page with allows the admin users to modify information of every employee in the database. Update & Delete are the two main functions of the modify page.

#### Update Employee page:
![image](https://user-images.githubusercontent.com/20519640/74865703-c8b25780-530e-11ea-9a34-4d33addb1f18.png)

This page requires the admin users to input the employee's SIN which they want to modify.

#### No matches employee page:
 
![image](https://user-images.githubusercontent.com/20519640/74865742-dcf65480-530e-11ea-9771-7024f817b6f1.png)

If the admin user inputs the SIN that is not in the database, the website will generate an error message and show it to the user.

#### Valid SIN update employee page:
![image](https://user-images.githubusercontent.com/20519640/74865754-e384cc00-530e-11ea-9418-caaa1af4f8f0.png)

If the admin user enters a valid SIN that exists in the database, the update page will show up with all information associated with. Also, a new table of detail information text field will appear below to require the admin user to enter the newest information about that SIN. 

####Successful update employee pages:
 
![image](https://user-images.githubusercontent.com/20519640/74865766-eb447080-530e-11ea-8489-6e3282c44568.png)

After clicking the UPDATE button, the website will generate a message webpage to the admin user and tell them it is updated successfully.

### Delete Employee page:
![image](https://user-images.githubusercontent.com/20519640/74865777-f0092480-530e-11ea-81af-b626097f47e7.png)

This is the delete employee pages, the admin user needs to enter the SIN of the employee who he/she wants to delete. The website will search for that SIN in the database first, if it is an existing employee, then execute the delete operation, if the SIN does not exist in the database, then generate an error message to the admin user. 
![image](https://user-images.githubusercontent.com/20519640/74865820-fb5c5000-530e-11ea-893d-a493e226274f.png)


### Match a search
 
![image](https://user-images.githubusercontent.com/20519640/74865840-ff886d80-530e-11ea-9601-2cbc9189ee21.png)


### Success message after deleting
 
![image](https://user-images.githubusercontent.com/20519640/74865852-03b48b00-530f-11ea-8406-9a5ab83e6cb6.png)


## Login as Cleaner page:
 
![image](https://user-images.githubusercontent.com/20519640/74865868-0a430280-530f-11ea-9bdb-9956f14bb155.png)


When a cleaner employee login, this page will generate in the browser. Similar to Admin login page with the navbar and the logout button on the top.


### View Job page:
 
![image](https://user-images.githubusercontent.com/20519640/74865884-0f07b680-530f-11ea-821d-62655d037283.png)

After clicking the view job button, the website will display all the jobs that under the login users account with all attribute details.

## Sales Login Page:
 
![image](https://user-images.githubusercontent.com/20519640/74865894-13cc6a80-530f-11ea-8c8f-36bc5c6e7a20.png)


This page is the Sales login page. When the user is a Sales employee, the website will generate this page when they login to their account. This page is similar to Admin and Cleaner page but with different navbar on the top. 

### Create Service page:
 
![image](https://user-images.githubusercontent.com/20519640/74865906-1a5ae200-530f-11ea-92f4-037bcf44fb19.png)

When the sales user click “Create Service”, it will lead the user to this page where the user can add the details about the new service. All text field had been set to null checking not available(“do not accept null value”). 

### Success create new service page:
 
![image](https://user-images.githubusercontent.com/20519640/74865923-2646a400-530f-11ea-809e-13c3c3207e94.png)

After creating the new service, the website will generate a message to show to the user that the service had been added to the database.

### Create Contract page:
![image](https://user-images.githubusercontent.com/20519640/74865931-2cd51b80-530f-11ea-8a1e-0eb337f53087.png)
![image](https://user-images.githubusercontent.com/20519640/74865950-35c5ed00-530f-11ea-8413-acf9e9486687.png)

This is the Create Contract page after the sales user enters this page, it will show all contract that is in the database with the foreign key ID of the Contract which is customer ID. Here the user can create a new contract by filling up all the details of the new contract. Once they click the create button after filling up all thess text field, the system will generate the message and tell the user it is been added to the contract database 


### Successful message after creating account
 
![image](https://user-images.githubusercontent.com/20519640/74865968-437b7280-530f-11ea-82c5-a8a2642cc0d2.png)


### View Contract page:
 
![image](https://user-images.githubusercontent.com/20519640/74865983-48d8bd00-530f-11ea-99a0-d1872e70078d.png)

 If the sales user click view contract button, this page will generate by the website. In this page, the system generates all contracts in the database, and list them by all attributes displayed in the page.


### Update Contract page:
 
![image](https://user-images.githubusercontent.com/20519640/74866001-4ece9e00-530f-11ea-8316-7c94c447c558.png)

The sales user can simply input the contract number and search the corresponding contract in the database. Then Update the Contract.

### Search Contract failed page:
![image](https://user-images.githubusercontent.com/20519640/74866019-568e4280-530f-11ea-9212-5f6ca9015c4e.png)

When the user is trying to search some contract ID that is not in the database, the website will generate an error message to the user.


### Search Contract success and change status page:
![image](https://user-images.githubusercontent.com/20519640/74866034-6017aa80-530f-11ea-8e8a-cf29497ff7c8.png)

When the input contract ID is a valid ID in the database, the page will show up the details of the searched and the Update text field to allow the user to update the status of the contract. 

### Delete Contract page:
 
![image](https://user-images.githubusercontent.com/20519640/74866046-673eb880-530f-11ea-940b-dc1f8a6d645f.png)

This is the delete contract page, same format as the update contract page. The sales user needs to enter a valid contract ID to access the delete page:
 
![image](https://user-images.githubusercontent.com/20519640/74866061-6c036c80-530f-11ea-8bb9-5a0cdc3bc4b6.png)

After the user click the delete button, the contract will be deleted from the database.





## Successful Login Page For Customers:
 
![image](https://user-images.githubusercontent.com/20519640/74866087-7b82b580-530f-11ea-8bb1-98913e60c01d.png)

If the users of the website login as a customer, and the user had a valid account which is existing in our database, this is the successful login page. At this stage, our page will only allow the users to reserve a specific cleaner. If the user wishes to leave the page, there is a logout button at the top right corner. 

### Error checking for null reference employee number:
 
![image](https://user-images.githubusercontent.com/20519640/74866098-80476980-530f-11ea-9009-9350b9a9afee.png)


Any null input for the text field of “Employee Reference Number” will be detected by the PHP code and pops up an error message window to remind the users

### Error checking for input data format:
 
![image](https://user-images.githubusercontent.com/20519640/74866114-863d4a80-530f-11ea-8257-c547cc6396a5.png)

For any date format that is not correct, the website will pop up error message checking to remind the user to input a correct date value for this text field.


### Successful reservation create page:
![image](https://user-images.githubusercontent.com/20519640/74866125-8b9a9500-530f-11ea-9678-7f6cffe872a3.png)

After every input is valid and submitted. The website will generate a message on the top which shows that the request is created. 



## Create Customer account page:
![image](https://user-images.githubusercontent.com/20519640/74866143-948b6680-530f-11ea-93a1-952540ff699f.png)

 If the customer does not have an associate account with the website, there is a create account button on the login page which allows them to create a new account in the database.

### Sign-up page:
![image](https://user-images.githubusercontent.com/20519640/74866164-9ead6500-530f-11ea-9f68-21c8ac7dbe0e.png)

After customers click the “Create Account” button, the website will lead them to the signup page which requires the customer to fill up the information to create the account. In the “Select Customer type” dropdown bar, we provide two customer types for the users to choose(Residential & Company). After choosing the type of customers, there will be a hidden text field shows up. Those hidden text fields are different depending on which customer type the user pick.




## Customer Signup page
###Residential  
![image](https://user-images.githubusercontent.com/20519640/74866183-a836cd00-530f-11ea-964c-eefa8c3ebab8.png)
###Commercial
![image](https://user-images.githubusercontent.com/20519640/74866197-b389f880-530f-11ea-9346-9f40dbd24911.png)


Under these pages, the website also provides null value checking for every text field and type check checking for (Email, Phone Number, Postal Code). It also checking if two password input equals. After a successful create an account, the website generate a success message and brings the user back to the login page shown below:
 
![image](https://user-images.githubusercontent.com/20519640/74866249-cc92a980-530f-11ea-8c96-2a092d5dfbfe.png)



## Maintenance page
 
![image](https://user-images.githubusercontent.com/20519640/74866262-d1575d80-530f-11ea-90c0-007051b9250e.png)

Here you have to option to check the equipment or supplies page

### Equipment page
 
![image](https://user-images.githubusercontent.com/20519640/74866277-d7e5d500-530f-11ea-8da0-045551431840.png)

Here you can select to view, add, update or delete an equipment


### View Equipment
 
![image](https://user-images.githubusercontent.com/20519640/74866284-dd431f80-530f-11ea-93a6-ea8ad5d1559a.png)

Here you can see all the equipment currently in the inventory

### Add equipment
 
![image](https://user-images.githubusercontent.com/20519640/74866296-e207d380-530f-11ea-9506-3b9fdabc5dd3.png)

Fill out the form click the add button

### Success message after added equipment
 
![image](https://user-images.githubusercontent.com/20519640/74866306-e7651e00-530f-11ea-9b50-2ab557e9e166.png)


### Update Equipment page
 
![image](https://user-images.githubusercontent.com/20519640/74866319-eb913b80-530f-11ea-9740-705be0843bc8.png)



### Succesful search
 
![image](https://user-images.githubusercontent.com/20519640/74866329-efbd5900-530f-11ea-94e0-efba1a58dba2.png)


### Unsuccessful search
 
![image](https://user-images.githubusercontent.com/20519640/74866334-f3e97680-530f-11ea-8ff8-de67596e5cfb.png)



### Delete Equipment Success
 
![image](https://user-images.githubusercontent.com/20519640/74866348-f8ae2a80-530f-11ea-8de3-8a31ca588980.png)

### Delete Equipment Unsuccessful
 
![image](https://user-images.githubusercontent.com/20519640/74866354-fc41b180-530f-11ea-9300-5e4c6b2770af.png)

### Supplies Page
 
![image](https://user-images.githubusercontent.com/20519640/74866365-02d02900-5310-11ea-93d3-5749510d1283.png)

The same exact functionality applies to supplies, the pages look exactly the same and they have the same functions. 

