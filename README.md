# Data Table 3.0

##### 1.將dataTable3/資料夾移至專案內

##### 2.設定HTML標籤
>> 複製以下標籤至你的PHP檔案內
```sh
<link rel="stylesheet" href="./dataTable3/css/dataTable3.css">
<script src="./dataTable3/dataTable3.js" type="module" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
```
##### 3.載入dataTable3 DOM元素
>>> x-data內的dataTable3需帶入的必填參數sql以及sql_count
sql :要回傳row data的語句
sql_count : 要回傳資料筆數的語句
columns : 要渲染至table內的所有資料庫欄位
`x-data function 必須寫 dataTable3() `
```sh
<div id="dataTable3" class="container-fluid" x-data="dataTable3({sql, sql_count, columns})" >
    <?php include "./dataTable3/component/main.php"; ?>
</div>
```
>>> 選填參數
```sh
<div id="dataTable3" class="container-fluid"  x-data="dataTable3({
    sql: sql_str,  
    sql_count: sql_count,
    columns:columnArr,
    sortField:'id', // 網頁初始化要排序的欄位，預設為id
    primary:'id', // 資料庫主key ，預設為id
})" >

```
##### 4.columns的寫法
>>> //必填
column : 資料庫欄位
text : 顯示在網頁上的名稱(innerText)
//選填
nowrap : (true、false)。 //是否在td內禁止換行，(預設false)，true:為強制不換行
align: ("left:"、"center"、"right") // 文字對齊，預設left
enum: Object //將取出的資料文字取代，例如取出"YY"要轉換為"結案同意" 。ex: {"YY": "結案同意"}
```sh
const columnArr = [
    { column: 'id', text: '客戶名稱'},
    { column: 'project_name', text: '客戶名稱'},
    { column: 'created_at', text: '建檔日期'},
    { column: 'created_at', text: '建檔日期', nowrap: false, align:"center", enum: {"YY": "結案同意", "YN": "結案不同意"}},
];

```
##### 4.填寫SQL語句注意事項
```sh
請在sql之中加入 (To search field) LIKE :search
//:search 不須加 %%，後端會自動加入
```


##### 5.html範例
```sh
<link rel="stylesheet" href="./dataTable3/css/dataTable3.css">
<script src="./dataTable3/dataTable3.js" type="module" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div id="dataTable3" class="container-fluid"  x-data="dataTable3({
    sql: sql, 
    sql_count: sql_count,
    sortField: sortField,
    columns:columnArr,
    primary: primaryId,
})" >
    <?php include "./dataTable3/component/main.php"; ?>
</div>
<script>
const sql = "SELECT * FROM ekp_sales_daily_report WHERE fd_project_name LIKE :search AND fd_create_date BETWEEN :start_date AND :end_date";
const sql_count = "SELECT COUNT(*) AS count FROM ekp_sales_daily_report WHERE fd_project_name LIKE :search AND fd_create_date BETWEEN :start_date AND :end_date";
const sortField = "created_at";
const columns = [
    { column: 'id', text: '客戶名稱', nowrap:false },
    { column: 'project_name', text: '客戶名稱', nowrap:false },
    { column: 'created_at', text: '建檔日期' , nowrap:false},
];
const primaryId = "id";
</script>
```

