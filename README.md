# About
**Production management systems (CodeIgniter)**
This is a website based system, the case of this system is for **factory production**, system focuses on production planning, production processes, machines and materials used and production reports. This system was created for case studies and learning purposes.

# Features
- **Dashboard** - Summary of production progress & history </br>
- **Customer** - Customer data, add & update </br>
- **Project** - Customer requests for product quantity to be produced</br>
- **Planning** - Production plan from customer request projects, includes shiftment, production date and target</br>
- **Shiftment**- Shiftment that works on the production process, includes the Leader (Staff Head) with production date and target</br>
- **Leader** -  Leader data (Staff Head) add & update</br>
- **Production** - The production process for each Shiftment, includes production planning, the machines and materials used in the production process</br>
- **Machine** - Machine data, status, and history of machine used</br>
- **Material** - Material data, stock, and history of material used</br>
- **Report** - Production report, includes sorting of production result (finished goods & waste)</br>
- **Warehouse** - Production progress from quantity request with total finished goods from completed production</br>

# Requirement
- **XAMPP** installed with **PHP** (version 8.0.25, not tested with other version yet)
- **Browser** (tested in google chrome)

# How to install
- Copy and extract zip file to ``xampp/htdocs``
- Open XAMPP Control Panel, then start on MySql and Apache
- Open ``localhost/phpmyadmin`` in a browser
- Create database with the name ``db_production``
- Import database file from ``/db/db_pengiriman.sql``
- Run this system in a browser ``localhost/production-management-system-main``
- Input login information from ``READMEEE!!.txt``

# Screenshot
- **Login**
<picture>
    <img src="ss/0.PNG" alt="Login">
</picture>

- **Dashboard**
<picture>
    <img src="ss/1.PNG" alt="Dashboard">
</picture>

- **Planning**
<picture>
    <img src="ss/2.PNG" alt="Planning">
</picture>

- **Production**
<picture>
    <img src="ss/3.PNG" alt="Production">
</picture>

- **Machine**
<picture>
    <img style="width:200px" src="ss/4.PNG" alt="Dashboard">
</picture>

- **Reports**
<picture>
    <img src="ss/5.PNG" alt="Reports">
</picture>
