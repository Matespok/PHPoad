PHPoad (PHP Organizes All Discussions)

A lightweight, work-in-progress web forum built in pure PHP with 100% human-crafted code.

About The Project

PHPoad is a minimalist discussion forum engine currently in active development.

Disclaimer: This project is currently in the MVP (Minimum Viable Product) stage. Known security practices, hardened input sanitization, and vulnerability patches are planned for upcoming milestones. Do not use this in a mission-critical production environment yet!

Key Details

Architecture: Human-written procedural/OOP PHP.

Development Status: Active WIP — active feature development is distributed across feature branches (git branch -a).

Getting Started

Follow these steps to get a local instance up and running.

Prerequisites

Ensure you have the following installed on your machine:

Docker and Docker Compose

PHP CLI (PHP 8.0+ recommended)

Installation & Setup

1. Clone the repository

git clone https://github.com/your-username/phpoad.git
cd phpoad


2. Configure Environment Variables

Create a .env file in the project root:

# Application Settings
APP_DEBUG=true                # Set to false in production

# Database Configuration
DBHOST=127.0.0.1             # Database host
DBNAME=mysqlPHPtoad          # Database name
DBUSER=username              # Database user
DBPASSWORD=UserPass          # Choose a strong password
DB_CHARSET=utf8mb4           # Recommended default

# Docker / Root Credentials
ROOT_PASSWORD=rootpassword


3. Start the Database Container

Spin up the database using Docker Compose:

docker-compose up -d


4. Launch the Local Web Server

Run the built-in PHP development server on your preferred port (e.g., 8000):

php -S localhost:8000


5. Open in Browser

Navigate to:

http://localhost:8000


The forum is now running locally.
