# cov-stat

Aplikasi pencatatan statistik COVID-19 untuk wilayah Kabupaten Wonosobo. Dilengkapi dengan API publik untuk akses data mutakhir. 
 
## Fitur Utama

 - Penyajian data jumlah Suspek, Probabel, Konfirmasi, Sembuh dan Meninggal
 - Penyajian data jumlah Suspek, Probabel, dan Konfirmasi dalam 7 hari terakhir dengan grafik
 - Administrasi data
 - API Publik
 
## Update
Terjadi ubahan terminologi

## Referensi API
**Data Mutakhir**  
Method: `GET`  
Endpoint: `/api2/mutakhir`  
Request body: `n/a`  
Response example:  
```
[
    {
        "id": "21",
        "tanggal": "2020-04-14",
        "suspek": "1950", 
        "probabel": "43",
        "konfirmasi": "4",
        "sembuh": "1",
        "meninggal": "0"
    }  
]
```  

**Data Per Rentang Tanggal**  
Method: `GET`  
Endpoint: `/api2/rentang/{tanggalAwal}/{tanggalAkhir}`  
> Format `tanggalAwal` dan `tanggalAkhir` adalah `'YYYY-MM-DD'`, 
> `tanggalAwal` harus lebih lampau dari `tanggalAkhir`

Request body: `n/a`  
Response example:  
```
[
    {
        "id": "20",
        "tanggal": "2020-04-13",
        "suspek": "1932", 
        "probabel": "38",
        "konfirmasi": "4",
        "sembuh": "1",
        "meninggal": "0"
    },
    {
        "id": "21",
        "tanggal": "2020-04-14",
        "suspek": "1950", 
        "probabel": "43",
        "konfirmasi": "4",
        "sembuh": "1",
        "meninggal": "0"
    }
]
```  

_Saran pengembangan dapat disampaikan melalui Issues atau dengan mengajukan PR_
