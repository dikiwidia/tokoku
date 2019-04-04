# Toko - KU
Toko-KU adalah aplikasi manajemen stok gudang untuk transaksi penjualan dan pembelian yang dikembangkan dengan Laravel 5.2 dan dukungan dari Bootstrap 4.
## Kebutuhan Sistem
Mengacu pada aturan dokumentasi [laravel-5.2] dan [bootstrap-4]
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
Setelah itu simpan dan pastikan nama file hanya berupa ekstensi ```.env```. Lanjutkan dengan masuk kedalam folder **tokoku** dan mulai melakukan proses pembaharuan composer dengan cara:
```sh
$ composer update
```
Jangan lupa untuk melakukan _generate key_ setelah selesai proses pembaharuan composer selesai, perintahnya seperti berikut:
```sh
$ php artisan key:generate
```
Lanjutkan dengan melakukan migrasi tabel kedalam basis data dengan cara:
```sh
$ php artisan migrate --seed
```
## Tampilan
![alt text](https://github.com/dikiwidia/tokoku/blob/dev/screenshot.png)

## Lisensi
MIT

[laravel-5.2]: <https://laravel.com/docs/5.2/#server-requirements>
[bootstrap-4]: <https://getbootstrap.com/docs/4.1/getting-started/introduction/>
