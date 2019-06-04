# GuvaPHP
Official Guva analetic library PHP backend

### PerformLogin.php
Allows a user to login to system
> PerformLogin?username=xyz&password=1234

Success -> Returns Active Stash | Fail -> Returns Error Object


### PerformLogout.php
Allows a user to login to system
> PerformLogout?stash=B4FGQ2VUE33UQSJZ

Success -> Returns 'Logged Out' | Fail -> Returns 'Logged Out'


### ResolveUser.php
Resolves all details of the logged user
> ResolveUser.php?stash=H4WVCUYYN5HNJIMC

Success -> Returns User Details | Fail -> Returns Returns Error Object

### ResolveLogStashes.php
Resolves a set of user sessions
> ResolveLogStashes.php?userid=1

Success -> Returns List Of User Stashes | Fail -> Returns Returns Error Object

### ResolveLogRecords.php
Resolves a set of user sessions
> ResolveLogRecords.php?stash=H4WVCUYYN5HNJIMC

Success -> Returns Logs Corresponds To Given Stash | Fail -> Returns Returns Error Object

### ResolveAppLibrary.php
Resolves list of apps associated with an account
> ResolveAppLibrary.php?stash=H4WVCUYYN5HNJIMC

Success -> Returns List Of Apps Associated | Fail -> Returns Returns Error Object

### ResolveApp.php
Resolves a specific app associated with an account
> ResolveApps.php?appid=123456&stash=H4WVCUYYN5HNJIMC

Success -> Returns App Details | Fail -> Returns Returns Error Object

### ResolveAppModules.php
Resolves list of modules attached to an app
> ResolveAppModules.php?appid=123456&stash=H4WVCUYYN5HNJIMC

Success -> Returns List Of Activated Modules | Fail -> Returns Returns Error Object

### ResolveModules.php
Resolves list of modules available for specific app
> ResolveModules.php?appid=123456&stash=H4WVCUYYN5HNJIMC

Success -> Returns List Of Activated Modules | Fail -> Returns Returns Error Object
