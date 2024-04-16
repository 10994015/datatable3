<?php include "./dataTable3/component/toolbar.php"; ?>
<?php include "./dataTable3/component/pagination.php"; ?>
<table class="table dataTable" x-ref="dataTable3">
    <thead>
        <tr>
            <template x-for="column in columns" :key="column.column">
                <th @click="sort(column.sort_field ? column.sort_field : column.column)" ><span x-text="column.text"></span><i :class="['fa-solid', 'fa-angle-down', sortDirection=='asc' ? 'sort' :'']" x-show="sortField==(column.sort_field ? column.sort_field : column.column)"></i></th>
            </template>
          
        </tr>
    </thead>
    <tbody x-show="data.length > 0 && !isLoading" x-cloak data-type="dataTable3">
        <template x-for="(item, idx) in data" :key="item[primary]">
            <tr>
                <template x-for="column in columns" :key="column.column">
                    <td x-html="column.enum ? column.enum[item[column.column]] : item[column.column]" :class="[column.nowrap ? 'nowrap' :'', column.align ? 'text-'+column.align : 'text-left']"></td>
                </template>
            </tr>
        </template>
    </tbody>
    <tbody x-show="data.length == 0 && !isLoading" class="notfound" x-cloak data-type="dataTable3">
        <tr>
            <td :colspan="columns.length">查無資料。</td>
        </tr>
    </tbody>
    <tbody x-show="isLoading" class="notfound" x-cloak data-type="dataTable3">
        <tr>
            <td :colspan="columns.length" >
                <div class="loading">
                    <div class="loader"></div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<?php include "./dataTable3/component/pagination.php"; ?>
<p class="copyright">Copyright © 2024 Masada.Li Cheng Yan All Rights Reserved.</p>
<script>
    const th = document.querySelector('thead').querySelectorAll('th')
</script>