# Dokumen Pengujian Black Box (Black Box Testing)
## Aplikasi Sistem Rekomendasi Produk Cat (Foxapaint)

---

## Tabel 1. Black Box Testing – Halaman Login

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | *Login* | *Login* menggunakan *email* dan *password* yang benar | *Email* dan *password* | *Login* berhasil dan menampilkan halaman *dashboard* |
| 2 | *Login* | *Login* menggunakan *email* dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *dashboard* |
| 3 | *Login* | *Login* menggunakan *email* yang salah dan *password* yang benar | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *dashboard* |
| 4 | *Login* | *Login* menggunakan *email* yang benar dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *dashboard* |
| 5 | *Login* | *Login* dengan kolom *email* dan *password* yang dikosongkan | *Email* dan *password* | *Login* gagal dan menampilkan pesan peringatan bahwa kolom wajib diisi |

---

## Tabel 2. Black Box Testing – Halaman Registrasi

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Registrasi | - Klik menu registrasi<br>- Mengisi seluruh kolom formulir registrasi dengan data yang valid<br>- Klik tombol "Daftar" | Nama, *email*, no. telp, perusahaan, divisi, provinsi, kota, *password* | Data berhasil tersimpan dan menampilkan notifikasi registrasi berhasil |
| 2 | Registrasi | - Klik menu registrasi<br>- Mengisi kolom *email* dengan *email* yang sudah terdaftar<br>- Klik tombol "Daftar" | *Email* yang sudah terdaftar | Registrasi gagal dan menampilkan pesan bahwa *email* sudah digunakan |
| 3 | Registrasi | - Klik menu registrasi<br>- Mengisi kolom *password* dan konfirmasi *password* dengan nilai yang tidak sama<br>- Klik tombol "Daftar" | *Password* dan konfirmasi *password* | Registrasi gagal dan menampilkan pesan konfirmasi *password* tidak cocok |
| 4 | Registrasi | - Klik menu registrasi<br>- Mengosongkan salah satu kolom yang wajib diisi<br>- Klik tombol "Daftar" | Kolom nama/email dikosongkan | Registrasi gagal dan menampilkan pesan peringatan bahwa kolom wajib diisi |

---

## Tabel 3. Black Box Testing Admin – Halaman Kategori

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data kategori | - Klik menu kategori<br>- Klik tombol "Tambah"<br>- Memasukkan nama kategori<br>- Klik tombol "Simpan" | Nama kategori | Data kategori berhasil ditambahkan |
| 2 | Tambah data kategori | - Klik menu kategori<br>- Klik tombol "Tambah"<br>- Mengosongkan kolom nama kategori<br>- Klik tombol "Simpan" | Nama kategori dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa nama kategori wajib diisi |
| 3 | Ubah data kategori | - Klik menu kategori<br>- Klik tombol "Ubah" pada kategori yang akan diubah<br>- Memasukkan nama kategori yang akan diubah<br>- Klik tombol "Simpan" | Nama kategori | Data kategori berhasil diubah |
| 4 | Hapus data kategori | - Klik menu kategori<br>- Klik tombol "Hapus" pada kategori yang akan dihapus<br>- Memilih kategori yang akan dihapus | - | Data kategori berhasil dihapus |

---

## Tabel 4. Black Box Testing Admin – Halaman Sub-Kategori

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "Tambah"<br>- Memilih kategori induk<br>- Memasukkan nama sub-kategori<br>- Klik tombol "Simpan" | Nama sub-kategori | Data sub-kategori berhasil ditambahkan |
| 2 | Tambah data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "Tambah"<br>- Mengosongkan kolom nama sub-kategori<br>- Klik tombol "Simpan" | Nama sub-kategori dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa nama sub-kategori wajib diisi |
| 3 | Ubah data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "Ubah" pada sub-kategori yang akan diubah<br>- Memasukkan nama sub-kategori yang akan diubah<br>- Klik tombol "Simpan" | Nama sub-kategori | Data sub-kategori berhasil diubah |
| 4 | Hapus data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "Hapus" pada sub-kategori yang akan dihapus<br>- Memilih sub-kategori yang akan dihapus | - | Data sub-kategori berhasil dihapus |

---

## Tabel 5. Black Box Testing Admin – Halaman Lokasi Penggunaan

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "Tambah"<br>- Memasukkan nama lokasi penggunaan<br>- Klik tombol "Simpan" | Nama lokasi penggunaan | Data lokasi penggunaan berhasil ditambahkan |
| 2 | Tambah data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "Tambah"<br>- Mengosongkan kolom nama lokasi<br>- Klik tombol "Simpan" | Nama lokasi dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa nama lokasi wajib diisi |
| 3 | Ubah data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "Ubah" pada lokasi yang akan diubah<br>- Memasukkan nama lokasi yang akan diubah<br>- Klik tombol "Simpan" | Nama lokasi penggunaan | Data lokasi penggunaan berhasil diubah |
| 4 | Hapus data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "Hapus" pada lokasi yang akan dihapus<br>- Memilih lokasi yang akan dihapus | - | Data lokasi penggunaan berhasil dihapus |

---

## Tabel 6. Black Box Testing Admin – Halaman Kebutuhan

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "Tambah"<br>- Memasukkan nama kebutuhan<br>- Klik tombol "Simpan" | Nama kebutuhan | Data kebutuhan berhasil ditambahkan |
| 2 | Tambah data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "Tambah"<br>- Mengosongkan kolom nama kebutuhan<br>- Klik tombol "Simpan" | Nama kebutuhan dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa nama kebutuhan wajib diisi |
| 3 | Ubah data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "Ubah" pada kebutuhan yang akan diubah<br>- Memasukkan nama kebutuhan yang akan diubah<br>- Klik tombol "Simpan" | Nama kebutuhan | Data kebutuhan berhasil diubah |
| 4 | Hapus data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "Hapus" pada kebutuhan yang akan dihapus<br>- Memilih kebutuhan yang akan dihapus | - | Data kebutuhan berhasil dihapus |

---

## Tabel 7. Black Box Testing Admin – Halaman Produk

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data produk | - Klik menu produk<br>- Klik tombol "Tambah"<br>- Memasukkan nama produk, memilih kategori, sub-kategori, lokasi penggunaan, dan kebutuhan<br>- Klik tombol "Simpan" | Nama produk, kategori, sub-kategori, lokasi penggunaan, kebutuhan | Data produk berhasil ditambahkan |
| 2 | Tambah data produk | - Klik menu produk<br>- Klik tombol "Tambah"<br>- Mengosongkan kolom nama produk<br>- Klik tombol "Simpan" | Nama produk dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa nama produk wajib diisi |
| 3 | Ubah data produk | - Klik menu produk<br>- Klik tombol "Ubah" pada produk yang akan diubah<br>- Memasukkan nama atau data produk yang akan diubah<br>- Klik tombol "Simpan" | Nama produk, kategori, sub-kategori, lokasi penggunaan, kebutuhan | Data produk berhasil diubah |
| 4 | Hapus data produk | - Klik menu produk<br>- Klik tombol "Hapus" pada produk yang akan dihapus<br>- Memilih produk yang akan dihapus | - | Data produk berhasil dihapus |

---

## Tabel 8. Black Box Testing Admin – Halaman Pengguna

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Tambah data pengguna | - Klik menu pengguna<br>- Klik tombol "Tambah"<br>- Memasukkan nama, *email*, no. telp, perusahaan, divisi, provinsi, kota, *password*, dan level<br>- Klik tombol "Simpan" | Nama, *email*, no. telp, *password*, level | Data pengguna berhasil ditambahkan |
| 2 | Tambah data pengguna | - Klik menu pengguna<br>- Klik tombol "Tambah"<br>- Mengosongkan salah satu kolom yang wajib diisi<br>- Klik tombol "Simpan" | Kolom nama/*email* dikosongkan | Data gagal ditambahkan dan menampilkan pesan bahwa kolom wajib diisi |
| 3 | Ubah data pengguna | - Klik menu pengguna<br>- Klik tombol "Ubah" pada pengguna yang akan diubah<br>- Memasukkan nama atau *email* atau no. telp atau level yang akan diubah<br>- Klik tombol "Simpan" | Nama, *email*, no. telp, level | Data pengguna berhasil diubah |
| 4 | Hapus data pengguna | - Klik menu pengguna<br>- Klik tombol "Hapus" pada pengguna yang akan dihapus<br>- Memilih pengguna yang akan dihapus | - | Data pengguna berhasil dihapus |

---

## Tabel 9. Black Box Testing Admin – Halaman Level

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Lihat data level | - Klik menu level | - | Menampilkan daftar seluruh data level yang terdapat pada sistem |
| 2 | Ubah data level | - Klik menu level<br>- Klik tombol "Ubah" pada level yang akan diubah<br>- Memasukkan kode atau nama level yang akan diubah<br>- Klik tombol "Simpan" | Kode level, nama level | Data level berhasil diubah |
| 3 | Ubah data level | - Klik menu level<br>- Klik tombol "Ubah" pada level yang akan diubah<br>- Mengosongkan kolom kode atau nama level<br>- Klik tombol "Simpan" | Kode/nama level dikosongkan | Data gagal diubah dan menampilkan pesan bahwa kolom wajib diisi |

---

## Tabel 10. Black Box Testing User – Halaman Rekomendasi

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Cari rekomendasi produk | - Klik menu rekomendasi<br>- Memilih kategori produk yang diinginkan<br>- Memilih sub-kategori produk<br>- Memilih lokasi penggunaan<br>- Memilih kebutuhan<br>- Klik tombol "Cari Rekomendasi" | Kategori, sub-kategori, lokasi penggunaan, kebutuhan | Sistem menampilkan daftar produk yang direkomendasikan sesuai dengan kriteria yang dipilih |
| 2 | Cari rekomendasi produk | - Klik menu rekomendasi<br>- Tidak memilih kriteria apapun<br>- Klik tombol "Cari Rekomendasi" | Tidak ada kriteria yang dipilih | Sistem gagal memproses dan menampilkan pesan peringatan bahwa kriteria wajib dipilih |

---

## Tabel 11. Black Box Testing User – Halaman Riwayat Input

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Lihat riwayat pencarian | - Klik menu riwayat input | - | Menampilkan daftar seluruh riwayat pencarian rekomendasi yang pernah dilakukan beserta tanggal pencarian |
| 2 | Lihat detail riwayat | - Klik menu riwayat input<br>- Klik tombol "Detail" pada riwayat yang ingin dilihat | - | Menampilkan detail kriteria pencarian dan daftar produk hasil rekomendasi pada waktu itu |

---

## Tabel 12. Black Box Testing – Halaman Profil

| No | Pengujian | Test Case | Data Masukan | Hasil yang Diharapkan |
|:---:|:---|:---|:---|:---|
| 1 | Ubah data profil | - Klik menu profil<br>- Mengubah data profil yang diinginkan (nama, no. telp, dsb)<br>- Klik tombol "Perbarui" | Nama, no. telp, perusahaan, divisi, provinsi, kota | Data profil berhasil diubah |
| 2 | Ubah *password* | - Klik menu profil<br>- Memasukkan *password* lama yang benar<br>- Memasukkan *password* baru dan konfirmasi *password* baru<br>- Klik tombol "Perbarui" | *Password* lama, *password* baru, konfirmasi *password* | *Password* berhasil diubah dan pengguna dapat masuk menggunakan *password* baru |
| 3 | Ubah *password* | - Klik menu profil<br>- Memasukkan *password* lama yang salah<br>- Memasukkan *password* baru dan konfirmasi *password* baru<br>- Klik tombol "Perbarui" | *Password* lama yang salah | *Password* gagal diubah dan menampilkan pesan bahwa *password* lama tidak sesuai |
