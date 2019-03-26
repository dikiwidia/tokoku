# Toko - KU
Toko-Ku adalah aplikasi manajemen stok gudang untuk transaksi penjualan dan pembelian yang dikembangkan dengan Laravel 5.5 dan dukungan dari Bootstrap 4. Dikembangkan oleh Moch Diki Widianto (Co-Founder BaduyTech Solutions)
## Kebutuhan Sistem
Mengacu pada aturan pada dokumentasi [laravel-5.5] dan [bootstrap-4]
## Instalasi
Langkah awal, _clonning_ dari repositori:
```sh
$ git clone https://github.com/dikiwidia/tokoku.git
```
Lanjutkan dengan menyalin file ```.env.example``` menjadi file baru ```.env``` kemudian ubah ```DB_DATABASE```, ```DB_USERNAME```, ```DB_PASSWORD``` sesuai dengan kebutuhan
```sh
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
Setelah itu simpan dan pastikan nama file hanya berupa ekstensi ```.env```. Lanjutkan dengan masuk kedalam folder tokoku lalu mulai dengan migrasi basis data dengan cara:
```sh
$ php artisan migrate --seed
```
## Tampilan
![alt text](https://github.com/dikiwidia/tokoku/blob/dev/screenshot.jpeg)

## Lisensi
MIT

[laravel-5.5]: <https://laravel.com/docs/5.5/#server-requirements>
[bootstrap-4]: <https://getbootstrap.com/docs/4.1/getting-started/introduction/>
