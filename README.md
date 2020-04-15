# cov-stat

Aplikasi pencatatan statistik COVID-19 untuk wilayah Kabupaten Wonosobo. Dilengkapi dengan API publik untuk akses data mutakhir. 
 
## Fitur Utama

 - Penyajian data jumlah ODP, PDP, Positif, Sembuh dan Meninggal
 - Penyajian data jumlah ODP, PDP dan Positif dalam 7 hari terakhir dengan grafik
 - Administrasi data
 - API Publik

## Referensi API
**Data Mutakhir**  
Method: `GET`  
Endpoint: `/api/mutakhir`  
Request body: `n/a`  
Response example:  
```
[
    {
        "id": "21",
        "tanggal": "2020-04-14",
        "odp": "1950", 
        "pdp": "43",
        "positif": "4",
        "sembuh": "1",
        "meninggal": "0"
    }  
]
```  

**Data Per Rentang Tanggal**  
Method: `GET`  
Endpoint: `/api/rentang/{tanggalAwal}/{tanggalAkhir}`  
> Format `tanggalAwal` dan `tanggalAkhir` adalah `'YYYY-MM-DD'`, 
> `tanggalAwal` harus lebih lampau dari `tanggalAkhir`

Request body: `n/a`  
Response example:  
```
[
    {
        "id": "20",
        "tanggal": "2020-04-13",
        "odp": "1932", 
        "pdp": "38",
        "positif": "4",
        "sembuh": "1",
        "meninggal": "0"
    },
    {
        "id": "21",
        "tanggal": "2020-04-14",
        "odp": "1950", 
        "pdp": "43",
        "positif": "4",
        "sembuh": "1",
        "meninggal": "0"
    }
]
```  

_Saran pengembangan dapat disampaikan melalui Issues atau dengan mengajukan PR_
