###**Laravel Products Application**
I will be using **laravel 5.5** for this test app. To get started I have installed it using the **laravel isntaller** in cli runnign `laravel new products app`. I committed the new fresh install the git and pushed it to the develop branch.

All that is left now is to install the vendors with composer and npm packages for the webpack compiler.

###**Considerations**

####**Scalability**
1: **Load balancer** to distribute workload/requests between servers on a cluster.
2: **Decoupling services** to smaller servers as apposed to having a all in one server. ***Docker*** can be utilized here.
3: **Memcached** or Redis servers for storing user sessions.

####**Performance**
1: **Consider your loops**, are the looping over large amounts of data, measure them for execution times, check to see if operations in them can be cached.
2: **Avoid making db requests inside a loop** where possible.

