# Map Publisher
This is an application for publishing spatial data through the OGC standard and GeoJSON format. It consists of the following components:
* A REST API for delivering the metadata (JSON format)
* An API for serving OWS request (through PHP Mapscript)
* A Web Page based on Bootleaf for publishing spatial data to the end-user
* An Admin Panel for managing the data delivered and viewed through the previews components

## Development
Map Publisher is currently under heavy development and fearly incomplete. It is planned to be complete for the first release during Summer 2015, as it is developed for the purposes of my MSc thesis.

## Installation
In order to install Map Publisher you need to pre-install the followings:
* Apache HTTP Server (Required)
* PHP (later than 5.4) (Required)
* UNM MapServer with PHP MapScript wrapper enabled on your server (Required)
* PHP Composer (Recommended)

After having those installed, just clone this repository under your public HTTP folder and you are free to go.

For now Laravel, Bootleaf and AdminLTE are part of the source code, so you won't have to install them separately. You may update Laravel and it's components using Composer, though.

## Usage
Supposing that you cloned the directory under your root of localhost, you may find the web front-end (Bootleaf) at `http://localhost/` and the web admin panel (AdminLTE) at `http://localhost/admin`.
