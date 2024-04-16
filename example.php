<link rel="stylesheet" href="./dataTable3/css/dataTable3.css">
<script src="./dataTable3/dataTable3.js" type="module" ></script>


<div id="dataTable3" class="container-fluid" x-data="dataTable3({sql, sql_count, columns})" >
    <?php include "./dataTable3/component/main.php"; ?>
</div>

<script>
    const sql = "SELECT * FROM account WHERE name LIKE :search";
    const sql_count = "SELECT COUNT(*) AS count FROM account WHERE name LIKE :search";
    const columns = [
        { column: 'id', text: 'ID',},
        { column: 'name', text: '姓名', },
        { column: 'create_at', text: '建檔日期',},
    ];
</script>