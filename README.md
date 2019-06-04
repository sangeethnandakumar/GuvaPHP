# GuvaPHP
Official Guva analetic library PHP backend

### PerformLogin.php
Allows a user to login to system
> PerformLogin?username=xyz&password=1234

Success -> Returns Active Stash

Fail -> Returns Error Object


### PerformLogout.php
Allows a user to login to system
> PerformLogout?stash=B4FGQ2VUE33UQSJZ

Success -> Returns 'Logged Out'

Fail -> Returns 'Logged Out'


### ResolveUser.php
Resolves all details of the logged user
> ResolveUser.php?stash=H4WVCUYYN5HNJIMC

Success -> Returns User Details

Fail -> Returns Returns Error Object
