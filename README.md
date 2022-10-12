# E-Yard Sale

E-Yard sale is an online bookstore for college students to buy and sell
their books from previous semesters. This is a win win for both buyers and
sellers since the sellers are making extra cash for books they do not need, and
the buyers will benefit from the low book prices compared to the local or some other
online bookstores.

First, a user will be directed to a main webpage where they can either sign up or login
if they are not a current user, they will go to the sign up page where they enter their
name, email address, school name, and password. These fields will be evaluated and validated
using signup-action.php file. All these data will be entered to the database and the password
will be hashed using a hashing algorithm so in case of a cyber attack, the user's password will
remain unknown.

When the user signs up successfully, they will be redirected to login through the login
page where they enter their email and password. If the email and password matches with the
information in the database, they user will then be redirected again to the main page, but now
they have the options to buy or sell books.

A user will not need a separate selling and buying account. They will be able to do both actions
using one main account.
