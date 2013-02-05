Overview
========

A web site which displays a tango* to the user for one day, after seven days the user will be presented with a test to see if they can remember the tango. 
If they get it correct then it will be marked as complete.

There will be an Android application as well as a web interface. Both the android app and the web interface will use OpenID to authenticate the user.  For the android app, as well as third party software it will support OAuth to access the tangos.

Web Interface
=============

The web interface will use Bootstrap, and a DBMS to store the tangos and user information. (In theory this can be accessed by the Android app).

\* A tango is a fact, word or piece of memorable information.

Database
========

Write database plan \'ere.
- Use Mongo DB 
- Contain a list of users email
- Contain all the tangos plus a viable question.
- Ability to mark tango complete for each user

Objectives
==========

Primary objectives must be completed before the android application begins development.

## Primary Objectives
+ A database of tangos
+ Display a unique tango for the user
+ Mark tango as complete
+ Test remember of tango

## Secondary Objectives
+ Customizable dates e.g. how long a tango lasts before test.

Hyperlinks
----------
- https://accounts.google.com/IssuedAuthSubTokens Used to revoke Open ID from the Google provider.
- http://code.google.com/p/lightopenid Open ID PHP Library
- http://code.google.com/p/openid-selector Open ID Selector written in javascript

