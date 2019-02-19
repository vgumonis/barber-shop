# Barber Shop Reservations

**Barber Shop** is designed with two users in mind *customer* and *barber*

**Database instalation**

Database configurations **must** bet entered in the *dbConfig.json* file. Or can be harcoded in *BaseDBRespository* class.

Database with tables can be created by running the *db-schema.sql* file.

Database can be populated by running the *db-populate.sql* file.


###Customer

To access *Customer* features please go to **/customer/reservation** eg. *http://localhost:8080/customer/reservation*.

*Customer* features include : *Adding new Reservation, Finding Reservation by code* if the reservation was made on current machine reservation is saved in a cookie and displayed upon entering the site.

One user can have only one reservation. 

Reservation time can be found out by searching with the unique code.  


###Barber

To access *Barber* features go to **/barber/reservation** eg. *http://localhost:8080/barber/reservation*.

*Barber* featured include: *List of all reservations, Ability to change status, Checking if apply discount, Adding a new reservation, Sort by today, tomorrow, date, Find by Name, Submit Complain*

Every time a reservations status is changed to *FINISHED* visited times counter is incremented by one.





