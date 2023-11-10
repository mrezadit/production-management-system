Production Management System (CodeIgniter) by mrezadit
See other systems at https://github.com/mrezadit
This system was created at 2022 for case studies and learning purposes
If you have any suggestions, please contact me at mrezadit@gmail.com

// Login information
ADMIN (Full Access)
username : admin
password : admin

LEADER (Shift Head)
username : leader
password : leader

// Requirement
1. XAMPP
2. PHP (version 8.0.25, not tested with other version yet)

// HOW TO INSTALL
1. Copy and extract this folder to xampp/htdocs
2. Create database with the name db_production in phpmyadmin
3. Import database file from /db/db_production.sql
3. Run this system in a browser, then input login information
4. Enjoy

// FEATURES
1. Dashboard - Summary of production progress & history
2. Customer - Customer data, add & update
3. Project - Customer requests for product quantity to be produced
4. Planning - Production plan from customer request projects, including shiftment, production date and target
5. Shiftment - Shiftment that works on the production process, including the Leader (Staff Head) with production date and target
6. Leader -  Leader data (Staff Head) add & update
7. Production - The production process for each Shiftment, including production planning, the machines and materials used in the production process
8. Machine - Machine data, status, and history of machine used
9. Material - Material data, stock, and history of material used
10. Report - Production report, including sorting of production result (finished goods & waste)
11. Warehouse - Production progress from quantity request with total finished goods from completed production
