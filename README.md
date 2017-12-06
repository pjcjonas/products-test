**Laravel Products Application**
Just set up the database in your .env file. Run the artisan migrations commande `php artisan migrate`. Then CD into ./public and run `php -S localhost:8080` to boot a quick php test server. Make sure your file is saved as a .csv before importing and that its set to "," sepperated delimeter. go to http://localhost:8080

I can at a later stage add a Laravel Excel vendor to manage the delimeter types, but for now I am focussing on standard , sepperated delimeters.

**Considerations**

These are just a few general observations of what we can do. But I added in a couple of TODO's in the project to illustrate what we can do to improve peformance.

**Scalability**
1: **Load balancer** to distribute workload/requests between servers on a cluster.
2: **Decoupling services** to smaller servers as apposed to having a all in one server. ***Docker*** can be utilized here.
3: **Memcached** or Redis servers for storing user sessions as well as queueing imports.

**Performance**
1: **Consider your loops**, are the looping over large amounts of data, measure them for execution times, check to see if operations in them can be cached.
2: **Avoid making db requests inside a loop** where possible.



