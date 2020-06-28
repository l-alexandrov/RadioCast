<h1 align="center">Radio Cast</h1>


## Installation

1. `cp .env.example .env`

2. :wrench: Configure `.env` file

3. `php artisan key:generate`

4. `php artisan migrate`

5. (Optional) `cp radio.example.xml ./storage/app/public/radio.xml`. Ajdust your XML API provider in `CheckForNewSong.php` instead.

##Starting
1. `php artisan check:newsong`
2. `php artisan serve`


## :black_nib: License

RadioCast is a small open-sourced software licensed under the [GNU (GPL-3.0) license](https://opensource.org/licenses/GPL-3.0).
