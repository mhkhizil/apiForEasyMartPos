#EasyMArtWebPosApiDocs

## Api Reference
_All api services need bearer_token to access_

### Authentication

__Login__ `POST`

```
 http://127.0.0.1:8000/api/v1/login
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
email      | string | **Required** |tth@gmail.com(admin)
password   | string | **Required** |11223344

### Dashboard

__Register__ `POST`

_Only admin can register the accounts_

```
 http://127.0.0.1:8000/api/v1/register
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | **Required**| Chit Chit
email      | string | **Required**| cc@gmail.com
password   | string | **Required** |11223344  
password_confirmation   | string | **Required** |11223344  
phone   | string | **Required** |0992841085  
date_of_birth   | string | **Required** |1.11.2000  
gender   | string | **Required** |male
address   | text | **Required** |min:50  
user_photo|url|default|url_link

__Logout__ `POST`

```
 http://127.0.0.1:8000/api/v1/logout
```
### Profile

__Get Profile__ `GET`

```
 http://127.0.0.1:8000/api/v1/profile
```
__Profile Update__ `PUT/PATCH`

```
 http://127.0.0.1:8000/api/v1/profile
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | **Required**| Chit Chit
email      | string | **Required**| cc@gmail.com 
phone   | string | **Required** |0992841085  
date_of_birth   | string | **Required** |1.11.2000  
gender   | string | **Required** |male
address   | text | **Required** |min:50  
user_photo|url|default|url_link

__Change Password__ `PUT`

```
 http://127.0.0.1:8000/api/v1/change-password
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
current_password      | string | **Required**| 11223344
new_password| string | **Required**| 111222333
new_password_confirmation   | string | **Required** |111222333  

### Users

_Only Admin can see these routes_

__Get Users__ `GET`

```
 http://127.0.0.1:8000/api/v1/users?page={id}&search={search}&orderBy={name}&sort={asc}
```
Parameter  |  Type  | Description 
-----------|--------|------------
search     | string | name,role,email(searable)
orderBy     | string | name,address,email,role
sort     | string | asc,desc

__Get Single User__ `GET`

```
 http://127.0.0.1:8000/api/v1/users/{id}
```

<!--__User Update__ `PUT/PATCH`

```
 http://127.0.0.1:8000/api/v1/users/{id}
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | **Required**| Chit Chit
email      | string | **Required**| cc@gmail.com
password   | string | **Required** |11223344  
password_confirmation   | string | **Required** |11223344  
phone   | string | **Required** |0992841085  
date_of_birth   | string | **Required** |1.11.2000  
gender   | string | **Required** |male
address   | text | **Required** |min:50  
user_photo|url|default|url_link


__User Delete__ `DELETE`

```
 http://127.0.0.1:8000/api/v1/users/{id}
```
-->
__Ban User__ `PATCH`

```
 http://127.0.0.1:8000/api/v1/users/{id}/ban
```
__Ban User List__ `GET`

```
 http://127.0.0.1:8000/api/v1/ban-users?page={id}&search={search}&orderBy={name}&sort={asc}
```
Parameter  |  Type  | Description 
-----------|--------|------------
search     | string | name,role,email(searable)
orderBy     | string | name,address,email,role
sort     | string | asc,desc
<!--For future-->
<!-- ### Devices and Log out

__All Devices__ `GET`

```
 http://127.0.0.1:8000/api/v1/devices
```

__Logout All Devices__ `POST`

```
 http://127.0.0.1:8000/api/v1/logout-all
```
-->
### Report

## Sale 

__Today Sale Overview__ `GET`
```
http://127.0.0.1:8000/api/v1/today-sale-overview
```

__Sale Overview [ Weekly,Monthly,Yearly ]__ `GET`
```
http://127.0.0.1:8000/api/v1/sale-overview/{type}
```

Parameter  |  Type  |  Status | Description 
-----------|--------|---------|------------
type      | string | **Required**| weekly,monthly,yearly

## Stock 

__Stock Overview__ `GET`
```
http://127.0.0.1:8000/api/v1/stock-overview
```

__Stock Overview List__ `GET`
```
http://127.0.0.1:8000/api/v1/stock-overview-lists?page={id}&search={search}&orderBy={name}&sort={asc}
```
Parameter  |  Type  | Description 
-----------|--------|------------
search     | string | name,unit(searable)
orderBy     | string | name,sale_price,total_stock,unit
sort     | string | asc,desc

## Dashboard

__Dashboard Overview [ Weekly,Monthly,Yearly ]__ `GET`
```
http://127.0.0.1:8000/api/v1/dashboard-overview/{type}
```


Parameter  |  Type  |  Status | Description 
-----------|--------|---------|------------
type      | string | **Required**| weekly,monthly,yearly


### Media

__Get Media__ `GET`

```
 http://127.0.0.1:8000/api/v1/media
```
__Photo Upload__ `POST`

```
 http://127.0.0.1:8000/api/v1/media
```

__Photo Delete__ `DELETE`

```
 http://127.0.0.1:8000/api/v1/media/{id}
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
photos      |file array | **Required**| []

### Brand

__Get Brands__ `GET`

```
 http://127.0.0.1:8000/api/v1/brands?page={id}&search={search}&orderBy={name}&sort={asc}
```
Parameter  |  Type  | Description 
-----------|--------|------------
search     | string | name,company,agent,phone,information(searable)
orderBy     | string | name,company,agent,phone,information
sort     | string | asc,desc

__Get Single Brand__ `GET`

```
 http://127.0.0.1:8000/api/v1/brands/{id}
```

__Create Brand__ `POST`

```
 http://127.0.0.1:8000/api/v1/brands
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | **Required** |MAMA(min:3)
company      | string | **Required** |MAMA co.ltd
information   | string | **Required** |min:50
photo          |url|nullable|default photo
agent          | string | **Required**| Daw Thi Thi
phone          | numeric | **Required**| 09969969969

__Update Brand__ `PUT/PATCH`

```
 http://127.0.0.1:8000/api/v1/brands/{id}
```
__You can update single parameter or more__

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | nullable| MAMA 3(min:3)
company      | string | nullable| MA MA
information   | string | nullable |min:50
photo  | url | nullable|default photo
agent          | string | **Required**| Daw Thi Thi
phone          | numeric | **Required**| 09969969969

__Delete Brand__ `DELETE`

_Only admin can delete_

```
 http://127.0.0.1:8000/api/v1/brands/{id}
```
### Product

__Get Products__ `GET`

```
 http://127.0.0.1:8000/api/v1/products?page={id}&search={search}&orderBy={name}&sort={asc}
```
Parameter  |  Type  | Description 
-----------|--------|------------
search     | string | name,unit(searable)
orderBy     | string | name,actual_price,sale_price,total_stock,unit,more_information
sort     | string | asc,desc

__Get Single Product__ `GET`

```
 http://127.0.0.1:8000/api/v1/products/{id}
```

__Get Stock History By Product Id__ `GET`

```
 http://127.0.0.1:8000/api/v1/stock-history/{productId}
```

__Get Sale History By Product Id__ `GET`

```
 http://127.0.0.1:8000/api/v1/sale-history/{productId}
```



__Create Product__ `POST`

```
 http://127.0.0.1:8000/api/v1/products
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | **Required** |Noodle(min:3)
brand_id      |integer  | **Required** |3
actual_price   | interger | **Required** |140(min:100)
sale_price   | interger | **Required** |190(min:100)
unit      |string  | **Required**| pack
more_information   | string | nullable |min:50
photo  | url | required|no default photo



__Update Product__ `PUT/PATCH`

```
 http://127.0.0.1:8000/api/v1/products/{id}
```
__You can update single parameter or more__

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
name      | string | nullable |Noodle(min:3)
brand_id      |integer  | nullable |3
actual_price   | interger | nullable |140(min:100)
sale_price   | interger | nullable |190(min:100)
unit      |string  | nullable| pack
more_information   | string | nullable |min:50
photo  | url | nullable|no default photo

__Delete Product__ `DELETE`

_Only admin can delete_

```
 http://127.0.0.1:8000/api/v1/products/{id}
```
### Stock


__Create Stock__ `POST`

```
 http://127.0.0.1:8000/api/v1/stocks
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
product_id      | integer | **Required** |3
quantity      | integer | **Required** |10
more_information   | string | nullable |min:50
<!--For future-->
<!--__Delete Stock__ `DELETE`

_Only admin can delete_

```
 http://127.0.0.1:8000/api/v1/stocks/{id}
```
-->
<!--### Voucher

__Get Vouchers__ `GET`

```
 http://127.0.0.1:8000/api/v1/vouchers?page={id}
```

__Get Single Voucher__ `GET`

```
 http://127.0.0.1:8000/api/v1/vouchers/{id}
```

__Update Voucher__ `PUT/PATCH`

```
 http://127.0.0.1:8000/api/v1/vouchers{id}
```
__You can update single parameter or more__

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
customer      | string | nullable |Aung Aung(min: 3)
phone      | integer | nullable |09969969969(min: 6)
net_total  | numeric | nullable | 100
tax  | numeric | nullable | 10
total  | numeric | nullable | 110


__Delete Voucher__ `DELETE`

_Only admin can delete_

```
 http://127.0.0.1:8000/api/v1/vouchers/{id}
```
-->
### Sale

__Checkout__ `POST`

```
 http://127.0.0.1:8000/api/v1/checkout
```

Arguments  |  Type  |  Status | Description 
-----------|--------|---------|------------
customer      | string | nullable |Aung Aung(min: 3)
phone      | integer | nullable |09969969969(min: 6)
voucher_records   | array | **Required** | [ { product_id, quantity } ]

__Sale Close__ `POST`

```
 http://127.0.0.1:8000/api/v1/sale-close
```
<!--For future-->
<!--__Monthly Close__ `POST`

```
 http://127.0.0.1:8000/api/v1/monthly-close?month=1&year=2023
```
-->
__Sale Open__ `POST`

```
 http://127.0.0.1:8000/api/v1/sale-open
```
__Recent__ `GET`

```
 http://127.0.0.1:8000/api/v1/recent&page={id}
```
### Finance

__Daily Records__ `GET`

```
 http://127.0.0.1:8000/api/v1/daily-records?date=1/2/2023&page={id}
```
__Monthly Records__ `GET`

```
 http://127.0.0.1:8000/api/v1/monthly-records?year=2023&month=2&page={id}
```
__Yearly Records__ `GET`

```
 http://127.0.0.1:8000/api/v1/yearly-records?year=2023&page={id}
```
__Custom Records__ `GET`

```
 http://127.0.0.1:8000/api/v1/custom?start=31/8/2023&end=31/8/2023&page={id}
```
