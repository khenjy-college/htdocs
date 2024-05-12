# hotel
 16/01/2024
In this document, I’ll explain how my coding style work
The web framework I’m currently using is a Codeigniter framework, mainly using MVP as it’s OOP workflow. And my current style was a product of the OOP that is Codeigniter.

Controller
There was parent Controller and child Controller. From this I made an array consist of many table, field names, and alias, then refer it on the child Controller. By using this I was able to reduce the usage of the table and field names. That means one change in the array will impact a lot of processes Controller and View in general, except field names on View. Using this method I was able to make a hypothesis that I will be able to create a lot of programs using Codeigniter framework this way. 
