# Jawaban Query

Query 1: Total Item dan Harga Pesanan *(5 point)*

Buat query untuk menghitung total jumlah item dan total harga per pesanan.
Column output:
- order_id
- customer_name
- order_date
- total_items (total jumlah produk dalam pesanan)
- total_price (total harga semua produk dalam pesanan)

**Jawaban**
```sql
SELECT 
    orders.id AS order_id, 
    orders.customer_name, 
    orders.order_date, 
    SUM(order_items.quantity) AS total_items,
    SUM(order_items.price) AS total_price
FROM 
    `orders` LEFT JOIN `order_items` ON orders.id = order_items.order_id
GROUP BY 
    orders.id, orders.customer_name, orders.order_date;
```

**Output**

![image](https://github.com/user-attachments/assets/c730ba8f-45cb-46be-89d4-2d2749de1c9c)

Query 2: Pesanan dengan Harga Total Tertinggi *(4 point)*
   
Cari pesanan dengan total harga tertinggi, dan tampilkan informasinya.
Column output:
- order_id
- customer_name
- order_date
- total_price

**Jawaban**
```sql
SELECT 
    orders.id AS order_id, 
    orders.customer_name, 
    orders.order_date, 
    SUM(order_items.price) AS total_price
FROM 
    `orders` LEFT JOIN `order_items` ON orders.id = order_items.order_id
GROUP BY 
    orders.id, orders.customer_name, orders.order_date
ORDER BY
    total_price DESC LIMIT 1;
```

**Output**

![image](https://github.com/user-attachments/assets/288924b4-bbd1-452e-88ea-5da90a2130b3)

Query 3: Produk Terpopuler *(4 point)*
   
Cari produk yang paling banyak dipesan berdasarkan jumlah total quantity di semua
pesanan.
Column output:
- product_id
- product_name
- total_quantity (jumlah total produk dipesan)

**Jawaban**
```sql
SELECT 
    products.id AS product_id, 
    products.name AS product_name,
    SUM(order_items.quantity) AS total_quantity
FROM 
    `products` LEFT JOIN `order_items` ON products.id = order_items.product_id
GROUP BY 
    products.id
ORDER BY
    total_quantity DESC LIMIT 1;
```

**Output**

![image](https://github.com/user-attachments/assets/9aec78ed-6084-475b-b486-aec005db36f1)

Query 4: Stok Produk Setelah Pemesanan *(4 point)*

Buat query untuk menampilkan semua produk beserta stoknya saat ini setelah
pemesanan dilakukan.
Column output:
- product_id
- product_name
- initial_stock (stok awal sebelum ada pesanan)
- remaining_stock (stok setelah semua pesanan)

**Jawaban**
```sql
SELECT 
	id AS product_id, 
    name AS product_name,
    stock AS initial_stock,
    current_stock AS remaining_stock
FROM `products`
```

**Output**

![image](https://github.com/user-attachments/assets/4ad6432e-57c7-4c1f-b6f2-3772a081a4be)


Query 5: Pesanan pada Bulan Tertentu *(3 point)*
Cari semua pesanan yang dibuat pada bulan tertentu (misalnya, November 2024).
Column output:
- order_id
- customer_name
- order_date
- total_price

**Jawaban**
```sql
SELECT 
	orders.id AS order_id,
    orders.customer_name,
    orders.order_date,
    SUM(order_items.price) AS total_price
FROM 
	`orders` LEFT JOIN `order_items` ON orders.id = order_items.order_id
WHERE 
	MONTH(`order_date`) = 11
GROUP BY
	orders.id;
```

**Output**

![image](https://github.com/user-attachments/assets/5eea2316-e980-40ee-85c1-9d71bb0d8758)


