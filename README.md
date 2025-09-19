# Aplikasi Arsip Surat

# Tujuan Aplikasi:
Mengarsipkan surat – surat resmi yang pernah dibuat oleh petugas kelurahan. Aplikasi dapat menyimpan dan menampilkan kembali surat – surat resmi yang telah dimasukkan dalam bentuk PDF 

# Fitur Aplikasi:
<ol>
<li>Melihat data kategori</li>
<li>Menambahkan data kategori</li>
<li>Mengedit data kategori</li>
<li>Menghapus data kategori</li>
<li>Melakukan pencarian pada data kategori (nama kategori)</li>
<li>Melihat data surat yang telah dipindai/dimasukkan</li>
<li>Menambahkan data surat</li>
<li>Mengedit data surat</li>
<li>Menghapus data surat</li>
<li>Mengunduh data surat</li>
<li>Melakukan pencarian pada data surat (nama file, judul surat, nomor surat)</li>
</ol>

# Cara Menjalankan Aplikasi:
## 1. Persiapan Awal
Kebutuhan Software:
<ul>
<li>PHP</li> 
<li>Web Server</li>
<li>Database Management System (DBMS)</li> 
<li>Laravel</li>
<li>Composer</li> 
<li>git</li>
</ul>
	
## 2. Post-Installation
Buat folder baru untuk menyimpan aplikasi ini.
Buka folder tersebut melalui terminal<br>
Clone repository ini (Bisa melalui HTTPS, SSH, atau GitHub CLI)
SSH:

~~~
git clone https://github.com/wahideins/aplikasi-surat/
~~~

##  3. Menjalankan Aplikasi 

<ul>
Buka folder hasil cloning melalui terminal
    
```
cd aplikasi-surat
```

Copy file .env.example dan masukkan ke file .env
```
cp .env.example .env
```
Edit File .env (Hilangkan semua tanda "# ")
<ul>
	<li>DB_CONNECTION=[Masukkan database yang digunakan, disarankan menggunakan tipe database relational]</li>
	<li>DB_HOST=127.0.0.1</li>
	<li>DB_PORT=3306</li>
	<li>DB_DATABASE= [Masukkan nama database yang ingin digunakan]</li>
	<li>DB_USERNAME=[Masukkan username database]</li>
	<li>DB_PASSWORD=[Masukkan password database]</li>
</ul>


Lakukan penginstallan dependencies:
```
composer install
```

Setelah dependencies terinstall, generate APP_KEY:
```
php artisan key:generate
```

Lakukan Migrasi database:
```
php artisan migrate
```

Buat symlink untuk menyimpan file:
```
php artisan storage:link
```

Jalankan Aplikasi:
```
php artisan serve
```

# Screenshot:
<ol>

## <li>Melihat data kategori</li>
<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/b9fee791-6668-4a45-aa35-159d73f7f3d5" />

## <li>Menambahkan data kategori</li>
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/34643ff9-0687-4fc7-8b9e-019664f7853f" />

<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/ddd8530e-ac6a-4f25-9132-b1ba73cf1e38" />


## <li>Mengedit data kategori</li>
<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/4fc73eb7-c801-4772-8485-4f507f3dcc0b" />

<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/2e040b5e-e50d-4e4a-99aa-465baa7bd225" />


## <li>Menghapus data kategori</li>
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/c7a510da-a96e-4f0d-abd3-ab50b787f5ad" />

<img width="1919" height="956" alt="image" src="https://github.com/user-attachments/assets/709ecc42-9971-4544-8656-7bddd8916d2c" />


## <li>Melakukan pencarian pada data kategori (nama kategori)</li>
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/e12cdd0c-97fb-4af6-8b6a-8cb57e7dce3a" />


## <li>Melihat data surat yang telah dipindai/dimasukkan</li>
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/07c06bf6-b654-4b7c-9cb5-da7dbded10f3" />
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/d49b3c3b-074d-4ee3-932b-537f279e22db" />



## <li>Menambahkan data surat</li>
<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/6be3adf3-6788-422f-9394-05b52b05d7fa" />

<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/11732305-ddad-4625-9e23-5a9a06d95cd2" />


## <li>Mengedit data surat</li>
<img width="1878" height="891" alt="image" src="https://github.com/user-attachments/assets/74f77d5e-2fd8-425a-9bdb-d1a6918a16f5" />

<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/421f5e47-9936-4e5a-a544-930519aa5b29" />

## <li>Menghapus data surat</li>
<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/ad46d498-dfff-4947-8d7c-fd583faf3d59" />

<img width="1919" height="958" alt="image" src="https://github.com/user-attachments/assets/a2af6708-a494-4194-81cf-42c2747ae063" />


## <li>Mengunduh Surat</li>
<img width="1878" height="783" alt="image" src="https://github.com/user-attachments/assets/f3db7cff-8c73-4f3f-b523-c37591f98056" />

## <li>Melakukan pencarian pada data surat (nama file, judul surat, nomor surat)</li>
<img width="1919" height="959" alt="image" src="https://github.com/user-attachments/assets/a49af614-3531-4f25-b76d-af1f2ccdb6c8" />

</ol>
