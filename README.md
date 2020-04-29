# LaraJWT

This is a straight-forward JWT Implementation with the help of the `Tymon/jwt-auth` Package for Laravel 5.x Framework.

This repository includes a complete login/logout cycle, and many other package API methods for token refreshing, getting credentials, grabbing payloads, and more.

The whole documentation can be found [here](https://jwt-auth.readthedocs.io/en/develop/).

## Pre-requisites

1. Create an empty database called `jwt`

2. Run the migrations

3. Add a record (email/password) to the `users` table. You can use the following script with Tinker.

```
$user = \App\User();
$user->name = "YOUR_NAME";
$user->email = "YOUR_EMAIL";
$user->password = bcrypt("YOUR_PASSWORD");
$user->save();
```

## Postman Requests

The `JWT Laravel API.postman_collection.json` file it's a `Postman` collection that contains all endpoints structure and examples for this repository. My setup is conformed via `Laravel Valet` and `MySQL5.7`.

## Credits

 - [David E Lares](https://twitter.com/davidlares3)

## License

 - [MIT](https://opensource.org/licenses/MIT)
