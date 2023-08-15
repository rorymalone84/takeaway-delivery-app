## Takeaway-Delivery App

I built this app using the Laravel framework as a demonstration of how I would produce an eccommerce site.


- It typically consists of a Admin/CMS area built from scratch, for admin users to add products to the store front.
- Admin can add multiple stores.
- Customers can search the nearest store by post code.
- Customers can add the previously mentioned products to a shopping cart.
- Customers can make an order containing all the products they added, plus delivery costs etc.
- Photos of products can be uploaded to the local host.
- Later I will move photo upload, database and deployment to AWS.

## Installation

This app was created on the XAMPP stack. But typically installation consists of downloading the app files from this repository and placing it in your localhost directory
folder.

- create a new schema in your sql database
- open in app folder in your code editor, then add the .env file with the necassary credentials to link the app to the new database schema

In the terminal:
  
- Navigate to the directory address where the app folder is located e.g ( C:\xampp\htdocs\TakeAwayApp> )
  input
- php artisan migrate
- php artisan db:seed
- npm run dev
- php artisan serve

Login:

This login will log you in as the admin, if your register later then users will be registered as 'customers' by default

username : admin@admin.com
password: password



## Status

This app is about 80% complete, the main functions work


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
