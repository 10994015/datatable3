<div class="toolbar">
    <div class="limit">
        <select x-model="limit" @change="getRowData()" aria-label="選擇顯示資料數量">
            <option value="99999999999">顯示全部</option>
            <option value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="500">500</option>
        </select>
    </div>
    <div class="search">
        <input type="text" x-model="search" placeholder="搜尋..." @input.debounce.300="getRowData()" aria-label="搜尋">
    </div>
</div>