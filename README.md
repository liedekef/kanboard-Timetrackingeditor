Timetrackingeditor
==================


Author
------

- Thomas Stinner
- ipunkt Business Solutions (various developers)

Requirements
------------

- Kanboard >= 1.0.38 (not testet with older versions)


Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/Timetrackingeditor`
3. Clone this repository into the folder `plugins/Timetrackingeditor`

Note: Plugin folder is case-sensitive.


Documentation
-------------

With this plugin you are able to edit, remove and manually create entries in the Time Tracking Table. 

Just go to a subtask, select "Time Tracking" (only visible if you have entered either an estimate and/or time spent value for the Task). Now you have the opportunity to add/remove/delete entries. You are only allowed to remove and edit your own entries.

You can also add comments to every Time Tracking entry and select if the time is billable or not. Entries that have been selected as billable have a shopping cart symbol. 

Additionally you can export all time tracking entries as an HTML table (which makes it easy to import to excel) using the command ``` kanboard export:allsubtaskstimetracking```

Adding or updating the time spent value allows you various formats:
- 1.00 for 1 hour (1.25 represents 1 hour and 15 minutes)
- 1,00 german value for 1 hour (1,25 represents 1 hour and 15 minutes)
- 1:00 industrial time range for 1 hour (1:08 represents 1 hour 8 minutes)
- 1:00:00 industrial time range for 1 hour (1:08:05 represents 1 hour 8 minutes and 5 seconds)

## Local Development

- update your docker-compose.yml version (and do not commit) to suit your user id and group id to fix the owner change from kanboard container
- open the [kanboard](http://localhost/) and use the default credentials `admin` and `admin`
