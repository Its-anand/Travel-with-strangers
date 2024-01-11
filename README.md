# Travel with stranger

Travel with Strangers is a platform that connects travelers with each other and helps them plan their trips together. Users can create a profile, add their travel preferences, and search for other users with similar interests. They can also join groups and chat with other members to plan their trips together. The application also provides a feature to book hotels directly from the website using Razorpay payment gateway.
## Features

- Sign up/ sign in.
- Email varification after registration feature.
- Post Images with description.
- Create Group with strangers.
- Join stranger group.
- Chat with stranger.
- Search Hotel
- Book Hotel
- Payment integration with Razorpay API.
- Hotel owner will able to see your group information after hotel is booked.

## Installation

To run this project locally, you need to have a web server with PHP support and a MySQL database. Follow these steps:

1. Clone this repository or download the zip file
2. Extract the files to your web server root directory (e.g. `htdocs` or `www`)
3. Create a database named `anandch_database` and import the `localhost.sql` file from the `database` folder which is inside the data folder 
4. Incase import fail then create a database named `anandch_database` and import the tables from the `database` folder which is inside the data folder
5. Edit the `connection.php` file in the `data` folder and update the database credentials and the Razorpay API key and secret key there are many video available on youtube regarding razorpay
6. Open your browser and navigate to `http://localhost/Travel-with-strangers`
7. Enjoy!

## Demo

You can see a live demo of this project here: https://www.anandchoudhary.in/projects/Travel-with-strangers/index.php

## License

This project is licensed under the BSD 3-Clause "New" or "Revised" License - see the [LICENSE](LICENSE) file for details.
