# Simple Codeigniter REST API
Simple source code for learning basic backend developer using REST API (login, CRUD).

# Test the API
You can test the API by including header `Content-Type`,`Client-Service` & `Auth-Key` with value `application/json`,`frontend-client` & `simplerestapi` in every request

And for API except `login` you must include `id` & `token` that you get after successfully login. The header for both look like this `User-ID` & `Authorization`

List of the API :

`[POST]` `/auth/login` json `{ "username" : "admin", "password" : "Admin123$"}`

`[GET]` `/state`

`[POST]` `/state/create` json `{ "state" : "x"}`

`[PUT]` `/state/update/:id` json `{ "state" : "y"}`

`[GET]` `/state/detail/:id`

`[DELETE]` `/state/delete/:id`

`[POST]` `/auth/logout`
"# dh-task" 
"# dh-task" 
"# dh-task" 
"# dh-task" 
