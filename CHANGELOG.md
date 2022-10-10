# Changelog

## v1.3.0 - 2022-10-10

### Added

- Allowed plugins into the `composer.json` file

### Changed

- php cs fixer version number
- dependabot github action version number

### Removed

- `package.json` and `package-lock.json`
- prettier config file

## V1.2.0 - 2022/06/02

### Added

- Tests for all the make commands
- Added return `SUCCESS` and `FAILURE` values to help with testing

### Changed

- Renamed all the commands to match Laravel styling e.g. `makeServiceCommand`
- Moved commands into an alphabetically order
- Changed cs to order imports alphabetically

## v1.1.0 - 2022/05/12

### Added

- Added `make:enum` command to create an enum file.

## v1.0.0 - 2022/05/07

### Added

- Added `make:service` command to create a service file.
- Added `make:trait` command to create a trait file.
- Added `make:action` command to create an action file.
- Added `create:user` command to ask questions for creating a new user.
