# Phone tracking app

This project is a web application built with Laravel 10, ReactJS, InertiaJS, PusherJS, and React-Leaflet.js. It serves as a dashboard with exposed endpoints for managing accounts and tracking real-time and historical location data from mobile devices. project is still in alpha phase.

## Purpose

The application allows users to:
- Register and manage accounts.
- Create child accounts under their main account.
- Install a native React application on Android or iOS devices for background location tracking.
- Push latitude and longitude coordinates, along with account credentials, to the server for mapping purposes.
- Display real-time location on a map using React-Leaflet.js.
- Store current location data in the database and archive older coordinates for historical tracking.

## Features

- **User Authentication:** Supports account registration and authentication.
- **Account Management:** Users can create and manage child accounts.
- **Real-time Location Tracking:** Mobile app sends location data to endpoints using PusherJS.
- **Mapping Interface:** Utilizes React-Leaflet.js for displaying live location updates on a map.
- **Historical Tracking:** Stores older coordinates in a separate table for historical analysis.

## Requirements

- PHP >= 8.0
- Laravel 10
- PusherJS
- React-Leaflet.js
- InertiaJS
- MySQL or MariaDB

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/OldNemesis1990/trackingapp.git
   cd project-directory