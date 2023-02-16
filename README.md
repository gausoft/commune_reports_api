# Municipalities Reports API

Municipalities Reports API is a RESTful API that allows citizens to report problems or issues in their communities, such as damaged public buildings, poor road conditions, and malfunctioning sanitation systems. The API enables citizens to submit reports, add media files to support their claims, vote on reports, and leave comments.

## Installation

1. Clone the repository: `git clone https://github.com/your-username/municipalities_reports_api.git`
2. Install dependencies: `composer install`
3. Create a copy of the `.env.example` file and rename it to `.env`
4. Generate an application key: `php artisan key:generate`
5. Set up your database in the `.env` file
6. Migrate the database: `php artisan migrate`

## Usage

To use the API, you will need to register for an API key. Once you have your key, you can make requests to the API. The following endpoints are available:

### Users

- `GET /api/users`: Get a list of all users
- `GET /api/users/{id}`: Get a specific user
- `POST /api/users`: Create a new user
- `PUT /api/users/{id}`: Update a user
- `DELETE /api/users/{id}`: Delete a user

### Reports

- `GET /api/reports`: Get a list of all reports
- `GET /api/reports/{id}`: Get a specific report
- `POST /api/reports`: Create a new report
- `PUT /api/reports/{id}`: Update a report
- `DELETE /api/reports/{id}`: Delete a report

### Media

- `GET /api/media`: Get a list of all media
- `GET /api/media/{id}`: Get a specific media
- `POST /api/media`: Create a new media
- `PUT /api/media/{id}`: Update a media
- `DELETE /api/media/{id}`: Delete a media

### Votes

- `GET /api/votes`: Get a list of all votes
- `GET /api/votes/{id}`: Get a specific vote
- `POST /api/votes`: Create a new vote
- `PUT /api/votes/{id}`: Update a vote
- `DELETE /api/votes/{id}`: Delete a vote

### Comments

- `GET /api/comments`: Get a list of all comments
- `GET /api/comments/{id}`: Get a specific comment
- `POST /api/comments`: Create a new comment
- `PUT /api/comments/{id}`: Update a comment
- `DELETE /api/comments/{id}`: Delete a comment

## Contributing

If you would like to contribute to this project, please follow these steps:

1. Fork the repository
2. Create a new branch for your changes
3. Make your changes and commit them
4. Push your changes to your fork
5. Submit a pull request
