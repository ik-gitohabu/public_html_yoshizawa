SELECT
dat_sales.code,
dat_sales.date,
dat_sales.code_member,
dat_sales.name AS dat_sales_name,
dat_sales.email,
dat_sales.postal1,
dat_sales.postal2,
dat_sales.address,
dat_sales.tel,
dat_sales_product.code_product,
mst_product.name AS mst_product_name,
dat_sales_product.price,
dat_sales_product.quantity
FROM dat_sales, dat_sales_product, mst_product
WHERE substr(dat_sales.date, 1, 4) = "2018"
AND substr(dat_sales.date, 6, 2) = "07"
AND substr(dat_sales.date, 9, 2) = "10"
AND dat_sales.code = dat_sales_product.code_sales
AND dat_sales_product.code_product = mst_product.code