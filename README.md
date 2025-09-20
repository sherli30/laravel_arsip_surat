## Aplikasi Web Arsip Surat PDF

## Tujuan
1. Menyimpan semua surat resmi dalam format PDF secara terpusat dan terstruktur.
2. Memudahkan pencarian & pengambilan surat berdasarkan judul atau kategori (cepat akses).
3. Menjamin ketersediaan dan keamanan dokumen (hindari kehilangan/kerusakan arsip fisik).
4. Mempercepat proses administrasi perangkat desa (unduh, lihat, dan kelola arsip dengan mudah).
5. Memberikan fitur manajemen kategori agar pengelompokan surat konsisten dan mudah dipelihara.

-----

## Fitur
1. Pencarian Surat – cari arsip surat berdasarkan judul/kata kunci.
2. Upload & Simpan Surat PDF – unggah surat resmi dalam format PDF.
3. Unduh & Lihat Surat – unduh atau tampilkan isi surat yang sudah tersimpan.
4. Hapus Surat – hapus arsip surat dengan konfirmasi terlebih dahulu.
5. Kelola Kategori Surat – tambah, edit, hapus kategori surat.
6. Halaman About – menampilkan profil pembuat aplikasi dan info pembuatan.

-----

## Cara Menjalankan 
1. composer install
2. Salin .env.example jadi .env lalu atur DB di .env
3. php artisan key:generate
4. php artisan migrate
5. php artisan storage:link
6. Import file arsip_surat.sql ke database
7. php artisan serve → buka http://127.0.0.1:8000

-----

## Screenshot
<img width="1919" height="892" alt="Arsip-Index" src="https://github.com/user-attachments/assets/dcf8a159-82cb-49f3-b294-97cdee994bef" />

<img width="1919" height="904" alt="Arsip-Create" src="https://github.com/user-attachments/assets/ed8a4df2-99e3-447b-91f3-e6aacf09d91c" />

<img width="1919" height="904" alt="Arsip-Create(ada datanya)" src="https://github.com/user-attachments/assets/cccfcd6c-a668-4cf4-aaf6-6a470a3651e0" />

<img width="1919" height="895" alt="Arsip-pop up berhasil ditambahkan" src="https://github.com/user-attachments/assets/f5d69815-3453-4452-a66d-39001406723e" />

<img width="1919" height="898" alt="Arsip-Lihat" src="https://github.com/user-attachments/assets/eded35ef-c548-484c-975d-3a512eafbf68" />

<img width="1919" height="905" alt="Arsip-Lihat(button)" src="https://github.com/user-attachments/assets/bf9d7e4b-704d-44f0-9f03-4dc050a8e33d" />

<img width="539" height="85" alt="Arsip-Hasil Download" src="https://github.com/user-attachments/assets/639bfe67-812a-4d19-8c94-ef448ccb40f2" />

<img width="1919" height="897" alt="Arsip-Edit" src="https://github.com/user-attachments/assets/db21ebb3-42ae-4150-959e-8ce849411d09" />

<img width="1919" height="830" alt="Arsip-Lihat PDF" src="https://github.com/user-attachments/assets/5d1dd9a9-b5b8-4e78-8fac-215faf230646" />

<img width="1919" height="894" alt="Arsip-pop up berhasil diperbarui" src="https://github.com/user-attachments/assets/a0ebf7c5-979b-42d6-8346-3c95d8e773c4" />

<img width="1919" height="893" alt="Arsip-Hapus" src="https://github.com/user-attachments/assets/2cc827d7-72aa-4b23-b0f5-4b5b5263dfa2" />

<img width="1919" height="899" alt="Kategori-Index" src="https://github.com/user-attachments/assets/259d48e3-ddc4-44bc-b131-f8c75a2e8f74" />

<img width="1919" height="893" alt="Kategori-Index(button)" src="https://github.com/user-attachments/assets/729de78e-9513-4ba4-a0ff-43c59844209b" />

<img width="1919" height="894" alt="Kategori-Create" src="https://github.com/user-attachments/assets/b32b1c66-90ca-4f61-847e-8fb7b093b73d" />

<img width="1918" height="892" alt="Kategori-Create(ada datanya)" src="https://github.com/user-attachments/assets/749a9724-f6b9-462b-8fb3-5c6d36ce3e66" />

<img width="1919" height="882" alt="Kategori-pop up berhasil ditambahkan" src="https://github.com/user-attachments/assets/33a238c9-e377-40c1-9108-0557bc311496" />

<img width="1919" height="900" alt="Kategori-Edit" src="https://github.com/user-attachments/assets/3f72af94-24b8-4a2f-b57d-472172dd53ed" />

<img width="1919" height="892" alt="Kategori-pop up berhasil diperbarui" src="https://github.com/user-attachments/assets/292aea70-6c38-44dd-a7eb-7818b4894908" />

<img width="1919" height="891" alt="Kategori-Hapus" src="https://github.com/user-attachments/assets/8159c3ba-5a85-4648-bc90-0bc334720e9f" />

<img width="1918" height="893" alt="About" src="https://github.com/user-attachments/assets/4678cda2-2020-464e-b0f4-e0e46cc3fe86" />
