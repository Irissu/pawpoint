# Pawpoint
Pawpoint is a laravel application. This application manages a fictitious veterinary clinic, as well as its users (Veterinarians and clients, and their pets) and an appointment section (still unfinished). This project is not a real project, it has been created with the sole purpose of learning.

## API
The API has endpoints for Users, allowing to save and return data.
An own service has been created to consume any API endpoint.

## Users and roles
There are two types of users with different permissions that are managed whose views are managed by their corresponding middlewares. Users can be owners or veterinarians.
## Pets

Pets have their own CRUD, as well as views for dogs and cats, and for all registered pets.
## Views
The views are numerous although many of them are not finished. The main view is the home page of the site. There are views that show us all vets, all owners, all dogs or cats, all pets, appointments, etc. I recommend to check them out.

The views are implemented by separating the different reusable components such as header, footer, main content and navbar.
## Security
Regarding security we can divide this section in two parts:

### Middlewares
Several middlewares have been created depending on user permissions and whether the user is logged in or not. As well as a very simple view for unauthorized users
- CheckOwner - verifies that the user has the role of owner
- CheckVet - verifies that the user has the role of veterinarian
- CheckType - verifies the type of role the user has

### Registration and login - 
Verify that the data entered is correct and prevent unwanted data entry through your controllers. No external libraries have been used for authentication from other services (for the moment).

*This documentation may be incomplete or contain errors.
