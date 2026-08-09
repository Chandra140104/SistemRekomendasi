# BAB VI. HASIL DAN PEMBAHASAN

## 6.1 Hasil Pengujian

### a. Black Box Testing

Sebagai kelanjutan dari implementasi dan pengujian, bab ini akan membahas tentang hasil dari penelitian. Hasil *Black Box Testing* yang melibatkan pengguna dapat dilihat pada tabel dibawah ini:

**Penguji:**
- Nama : ...........................
- Tanggal Pengujian : ...........................

---

## a. *Black Box Testing* Admin Halaman *Login*

Tabel 6.1 menampilkan skenario pengujian *black box testing* pada halaman *login* sebagai berikut:

**Tabel 6.1 *Black Box Testing* Admin Halaman *Login***

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | *Login* | *Login* menggunakan *email* dan *password* yang benar | *Email* dan *password* | *Login* berhasil dan menampilkan halaman *home* | Berhasil menampilkan halaman *home* | Sesuai |
| 2 | *Login* | *Login* menggunakan *email* dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |
| 3 | *Login* | *Login* menggunakan *email* yang salah dan *password* yang benar | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |
| 4 | *Login* | *Login* menggunakan *email* yang benar dan *password* yang salah | *Email* dan *password* | *Login* gagal dan tidak menampilkan halaman *home* | Menampilkan halaman *login* | Sesuai |

---

## b. *Black Box Testing* Admin Halaman Pengguna (*User*)

Tabel 6.2 menampilkan skenario pengujian *black box testing* pada halaman pengguna sebagai berikut:

**Tabel 6.2 *Black Box Testing* Admin Halaman Pengguna**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data pengguna | - Klik menu pengguna<br>- Klik tombol "tambah +"<br>- Memasukkan nama, *email*, no. telp, perusahaan, divisi, provinsi, kota, *password*, dan level<br>- Klik tombol "Simpan" | Nama, *email*, no. telp, *password*, level | Data pengguna berhasil ditambahkan | Berhasil menambahkan data pengguna | Sesuai |
| 2 | Ubah data pengguna | - Klik menu pengguna<br>- Klik tombol "ubah" pada pengguna yang akan diubah<br>- Memasukkan nama atau *email* atau *password* atau level yang akan diubah<br>- Klik tombol "Simpan" | Nama, *email*, no. telp, *password*, level | Data pengguna berhasil diubah | Berhasil mengubah data pengguna | Sesuai |
| 3 | Hapus data pengguna | - Klik menu pengguna<br>- Klik tombol "hapus"<br>- Memilih pengguna yang akan dihapus | - | Data pengguna berhasil dihapus | Berhasil menghapus data pengguna | Sesuai |
| 4 | Pencarian data pengguna | - Klik menu pengguna<br>- Memasukkan nama pengguna yang akan dicari<br>- Klik tombol "cari" | Nama pengguna | Data pengguna berhasil ditampilkan | Berhasil menampilkan data pengguna | Sesuai |

---

## c. *Black Box Testing* Admin Halaman Kategori

Tabel 6.3 menampilkan skenario pengujian *black box testing* pada halaman kategori sebagai berikut:

**Tabel 6.3 *Black Box Testing* Admin Halaman Kategori**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data kategori | - Klik menu kategori<br>- Klik tombol "tambah +"<br>- Memasukkan nama kategori<br>- Klik tombol "Simpan" | Nama kategori | Data kategori berhasil ditambahkan | Berhasil menambahkan data kategori | Sesuai |
| 2 | Ubah data kategori | - Klik menu kategori<br>- Klik tombol "ubah" pada kategori yang akan diubah<br>- Memasukkan nama kategori yang akan diubah<br>- Klik tombol "Simpan" | Nama kategori | Data kategori berhasil diubah | Berhasil mengubah data kategori | Sesuai |
| 3 | Hapus data kategori | - Klik menu kategori<br>- Klik tombol "hapus"<br>- Memilih kategori yang akan dihapus | - | Data kategori berhasil dihapus | Berhasil menghapus data kategori | Sesuai |

---

## d. *Black Box Testing* Admin Halaman Sub-Kategori

Tabel 6.4 menampilkan skenario pengujian *black box testing* pada halaman sub-kategori sebagai berikut:

**Tabel 6.4 *Black Box Testing* Admin Halaman Sub-Kategori**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "tambah +"<br>- Memilih kategori induk<br>- Memasukkan nama sub-kategori<br>- Klik tombol "Simpan" | Nama sub-kategori dan kategori induk | Data sub-kategori berhasil ditambahkan | Berhasil menambahkan data sub-kategori | Sesuai |
| 2 | Ubah data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "ubah" pada sub-kategori yang akan diubah<br>- Memasukkan nama sub-kategori yang akan diubah<br>- Klik tombol "Simpan" | Nama sub-kategori | Data sub-kategori berhasil diubah | Berhasil mengubah data sub-kategori | Sesuai |
| 3 | Hapus data sub-kategori | - Klik menu sub-kategori<br>- Klik tombol "hapus"<br>- Memilih sub-kategori yang akan dihapus | - | Data sub-kategori berhasil dihapus | Berhasil menghapus data sub-kategori | Sesuai |

---

## e. *Black Box Testing* Admin Halaman Lokasi Penggunaan

Tabel 6.5 menampilkan skenario pengujian *black box testing* pada halaman lokasi penggunaan sebagai berikut:

**Tabel 6.5 *Black Box Testing* Admin Halaman Lokasi Penggunaan**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "tambah +"<br>- Memasukkan nama lokasi penggunaan<br>- Klik tombol "Simpan" | Nama lokasi penggunaan | Data lokasi penggunaan berhasil ditambahkan | Berhasil menambahkan data lokasi penggunaan | Sesuai |
| 2 | Ubah data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "ubah" pada lokasi yang akan diubah<br>- Memasukkan nama lokasi penggunaan yang akan diubah<br>- Klik tombol "Simpan" | Nama lokasi penggunaan | Data lokasi penggunaan berhasil diubah | Berhasil mengubah data lokasi penggunaan | Sesuai |
| 3 | Hapus data lokasi penggunaan | - Klik menu lokasi penggunaan<br>- Klik tombol "hapus"<br>- Memilih lokasi penggunaan yang akan dihapus | - | Data lokasi penggunaan berhasil dihapus | Berhasil menghapus data lokasi penggunaan | Sesuai |

---

## f. *Black Box Testing* Admin Halaman Kebutuhan

Tabel 6.6 menampilkan skenario pengujian *black box testing* pada halaman kebutuhan sebagai berikut:

**Tabel 6.6 *Black Box Testing* Admin Halaman Kebutuhan**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "tambah +"<br>- Memasukkan nama kebutuhan<br>- Klik tombol "Simpan" | Nama kebutuhan | Data kebutuhan berhasil ditambahkan | Berhasil menambahkan data kebutuhan | Sesuai |
| 2 | Ubah data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "ubah" pada kebutuhan yang akan diubah<br>- Memasukkan nama kebutuhan yang akan diubah<br>- Klik tombol "Simpan" | Nama kebutuhan | Data kebutuhan berhasil diubah | Berhasil mengubah data kebutuhan | Sesuai |
| 3 | Hapus data kebutuhan | - Klik menu kebutuhan<br>- Klik tombol "hapus"<br>- Memilih kebutuhan yang akan dihapus | - | Data kebutuhan berhasil dihapus | Berhasil menghapus data kebutuhan | Sesuai |

---

## g. *Black Box Testing* Admin Halaman Produk

Tabel 6.7 menampilkan skenario pengujian *black box testing* pada halaman produk sebagai berikut:

**Tabel 6.7 *Black Box Testing* Admin Halaman Produk**

| No | Pengujian | *Test Case* | Data Masukan | Hasil yang Diharapkan | Hasil Pengujian | Status |
|:--:|:---|:---|:---|:---|:---|:--:|
| 1 | Tambah data produk | - Klik menu produk<br>- Klik tombol "tambah +"<br>- Memasukkan nama produk<br>- Memilih kategori, sub-kategori, lokasi penggunaan, dan kebutuhan produk<br>- Klik tombol "Simpan" | Nama produk, kategori, sub-kategori, lokasi penggunaan, kebutuhan | Data produk berhasil ditambahkan | Berhasil menambahkan data produk | Sesuai |
| 2 | Ubah data produk | - Klik menu produk<br>- Klik tombol "ubah" pada produk yang akan diubah<br>- Memasukkan nama atau memilih kategori atau sub-kategori atau lokasi penggunaan atau kebutuhan yang akan diubah<br>- Klik tombol "Simpan" | Nama produk, kategori, sub-kategori, lokasi penggunaan, kebutuhan | Data produk berhasil diubah | Berhasil mengubah data produk | Sesuai |
| 3 | Hapus data produk | - Klik menu produk<br>- Klik tombol "hapus"<br>- Memilih produk yang akan dihapus | - | Data produk berhasil dihapus | Berhasil menghapus data produk | Sesuai |
| 4 | Pencarian data produk | - Klik menu produk<br>- Memilih kategori produk yang akan dicari<br>- Klik tombol "filter" | Nama kategori | Data produk berhasil ditampilkan berdasarkan kategori | Berhasil menampilkan data produk | Sesuai |
