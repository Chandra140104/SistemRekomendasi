# BAB VI. HASIL DAN PEMBAHASAN

## 6.2 Hasil Pengujian – Role User / Pelanggan

Sebagai kelanjutan dari implementasi dan pengujian, bab ini akan membahas tentang hasil dari penelitian. Hasil *Black Box Testing* yang melibatkan pengguna dapat dilihat pada tabel dibawah ini:

**Penguji:**
- Nama : ...........................
- Tanggal Pengujian : ...........................

---

## a. *Black Box Testing* User Halaman *Login*

Tabel 6.8 menampilkan skenario pengujian *black box testing* pada halaman *login* sebagai berikut:

**Tabel 6.8 *Black Box Testing* User Halaman *Login***

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | *Login* | *Login* menggunakan *email* dan *password* yang benar | *Email* dan *password* | *Login* berhasil dan menampilkan halaman *home* | Berhasil menampilkan halaman *home* | Sesuai |
| 2 | *Login* | *Login* menggunakan *email* dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |
| 3 | *Login* | *Login* menggunakan *email* yang salah dan *password* yang benar | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |
| 4 | *Login* | *Login* menggunakan *email* yang benar dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |

---

## b. *Black Box Testing* User Halaman Registrasi

Tabel 6.9 menampilkan skenario pengujian *black box testing* pada halaman registrasi sebagai berikut:

**Tabel 6.9 *Black Box Testing* User Halaman Registrasi**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Registrasi | - Klik menu registrasi<br>- Mengisi seluruh kolom formulir registrasi dengan data yang valid<br>- Klik tombol "Daftar" | Nama, *email*, no. telp, perusahaan, divisi, provinsi, kota, *password* | Data berhasil tersimpan dan menampilkan notifikasi registrasi berhasil | Berhasil menampilkan notifikasi registrasi berhasil | Sesuai |
| 2 | Registrasi | - Klik menu registrasi<br>- Mengisi kolom *email* dengan *email* yang sudah terdaftar<br>- Klik tombol "Daftar" | *Email* yang sudah terdaftar | Registrasi gagal dan menampilkan pesan bahwa *email* sudah digunakan | Menampilkan pesan *email* sudah terdaftar | Sesuai |
| 3 | Registrasi | - Klik menu registrasi<br>- Mengisi kolom *password* dan konfirmasi *password* dengan nilai yang tidak sama<br>- Klik tombol "Daftar" | *Password* dan konfirmasi *password* | Registrasi gagal dan menampilkan pesan konfirmasi *password* tidak cocok | Menampilkan pesan konfirmasi *password* tidak cocok | Sesuai |
| 4 | Registrasi | - Klik menu registrasi<br>- Mengosongkan salah satu kolom yang wajib diisi<br>- Klik tombol "Daftar" | Kolom nama/*email* dikosongkan | Registrasi gagal dan menampilkan pesan peringatan bahwa kolom wajib diisi | Menampilkan pesan kolom wajib diisi | Sesuai |

---

## c. *Black Box Testing* User Halaman Rekomendasi

Tabel 6.10 menampilkan skenario pengujian *black box testing* pada halaman rekomendasi sebagai berikut:

**Tabel 6.10 *Black Box Testing* User Halaman Rekomendasi**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Rekomendasi | - Klik menu rekomendasi<br>- Memilih kategori produk yang diinginkan<br>- Memilih sub kategori produk yang diinginkan<br>- Memilih lokasi penggunaan produk (dapat lebih dari satu)<br>- Memilih kebutuhan produk yang diinginkan (dapat lebih dari satu)<br>- Klik tombol "Cari Rekomendasi" | Kategori, sub kategori, lokasi penggunaan, dan kebutuhan | Tampil hasil rekomendasi produk cat sesuai kriteria yang dipilih | Berhasil menampilkan hasil rekomendasi | Sesuai |
| 2 | Rekomendasi | - Klik menu rekomendasi<br>- Tidak memilih kategori produk<br>- Tidak memilih sub kategori produk<br>- Tidak memilih lokasi penggunaan<br>- Tidak memilih kebutuhan<br>- Klik tombol "Cari Rekomendasi" | Kategori, sub kategori, lokasi penggunaan, dan kebutuhan dikosongkan | Sistem gagal memproses dan menampilkan pesan peringatan bahwa kriteria wajib dipilih | Menampilkan pesan peringatan kriteria wajib dipilih | Sesuai |

---

## d. *Black Box Testing* User Halaman Riwayat Input

Tabel 6.11 menampilkan skenario pengujian *black box testing* pada halaman riwayat input sebagai berikut:

**Tabel 6.11 *Black Box Testing* User Halaman Riwayat Input**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Lihat riwayat input | - Klik menu riwayat input | - | Menampilkan daftar seluruh riwayat pencarian rekomendasi yang pernah dilakukan pengguna beserta tanggal pencarian | Berhasil menampilkan daftar riwayat input | Sesuai |
| 2 | Lihat detail riwayat | - Klik menu riwayat input<br>- Klik tombol "Detail" pada riwayat yang ingin dilihat | - | Menampilkan detail kriteria pencarian yang pernah diinputkan beserta daftar produk hasil rekomendasi | Berhasil menampilkan detail riwayat dan hasil rekomendasi | Sesuai |

---

## e. *Black Box Testing* User Halaman Profil

Tabel 6.12 menampilkan skenario pengujian *black box testing* pada halaman profil sebagai berikut:

**Tabel 6.12 *Black Box Testing* User Halaman Profil**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Ubah data profil | - Klik menu profil<br>- Mengubah data profil yang diinginkan seperti nama, no. telp, perusahaan, divisi, provinsi, atau kota<br>- Klik tombol "Perbarui" | Nama, no. telp, perusahaan, divisi, provinsi, kota | Data profil berhasil diubah dan menampilkan notifikasi perubahan berhasil | Berhasil mengubah data profil | Sesuai |
| 2 | Ubah data profil | - Klik menu profil<br>- Mengosongkan kolom nama atau no. telp yang wajib diisi<br>- Klik tombol "Perbarui" | Kolom nama/no. telp dikosongkan | Perubahan data profil gagal dan menampilkan pesan peringatan bahwa kolom wajib diisi | Menampilkan pesan kolom wajib diisi | Sesuai |

---

## f. *Black Box Testing* User Halaman Katalog

Tabel 6.13 menampilkan skenario pengujian *black box testing* pada halaman katalog sebagai berikut:

**Tabel 6.13 *Black Box Testing* User Halaman Katalog**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Lihat katalog produk | - Klik menu katalog | - | Menampilkan seluruh daftar produk cat yang tersedia beserta informasi kategori dan lokasi penggunaan | Berhasil menampilkan seluruh daftar produk | Sesuai |
| 2 | Filter katalog berdasarkan kategori | - Klik menu katalog<br>- Memilih salah satu kategori produk yang tersedia<br>- Klik tombol "Filter" | Nama kategori | Menampilkan daftar produk yang sesuai dengan kategori yang dipilih | Berhasil menampilkan produk berdasarkan kategori | Sesuai |
