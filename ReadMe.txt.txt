1. home_view.php should have your html5 code.
2. home.js under JS folder should have code to call any API, manipulate the base html in home_view.php and pass the data. please stick to Core JS or JQuery.
3. custom.css under css should be used for any custom css elements.
4. Business logic to write data to db should be in HomeController.php
5. API.php should be used to define your apis for the logics written under HomeController.php

###################################################################################
UI (Bootstrap4, HTML5, CSS3, JQuery, JS):

1. Asthetics are up to you. The more clean it is, more the points you get.
2. Should have an option to select state, date range.
3. Should show data in JS data tables (Find more here: https://datatables.net/). Select any 6-7 meaningful columns to be shown.
4. Use the selected date range to filter the fetched data (within JS) and show appropriately.

###################################################################################

API TO USE:

All API requests should be made to: https://api.covidtracking.com

JSON format, END POINT:
/v1/states/{state}/daily.json

Example: https://api.covidtracking.com/v1/states/ca/daily.json

This gives you data for each day for a single state from the beginning ie., March 4th, 2020 (only US states).

###################################################################################

FIND MORE DETAILS HERE:

https://covidtracking.com/data/api

**Solution**
Tools Used :
XAMPP - Apache, MySQL and php
Visual Studio code as the IDE