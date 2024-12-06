1. Query 1: Total Item dan Harga Pesanan *(5 point)*
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
        `orders`
    LEFT JOIN 
        `order_items` 
    ON 
        orders.id = order_items.order_id
    GROUP BY 
        orders.id, orders.customer_name, orders.order_date;

**Output**

![image](https://github.com/user-attachments/assets/c730ba8f-45cb-46be-89d4-2d2749de1c9c)
