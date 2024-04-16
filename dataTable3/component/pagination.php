<div class="pagination" id="pagination"  x-cloak data-type="dataTable3" x-show="data.length > 0">
    <small  x-show="data.length > 0" x-text="'顯示第'+((Number(currentpage)-1)*Number(limit)+1)+' 至 '+((((Number(currentpage)-1)*Number(limit) +Number(limit))< dataLangth) ? ((Number(currentpage)-1)*Number(limit) +Number(limit)) : dataLangth )+' 項結果，共 '+dataLangth+' 項'"></small>
    <div class="links">
        <template x-if="currentpage>1">
            <a href="###" @click="switchPage(currentpage-1)">&laquo;</a>
        </template>
        <template x-if="pageNumber <= 10">
            <template x-for="page in pageNumber">
                <a href="javascript:;" @click="switchPage(page)" :class="[(page == currentpage) ? 'active' : '']" x-text="page"></a>
            </template>
        </template>
        <template x-if="pageNumber > 10">
            <select @change="selectPage($event)" style="width:66px;padding:8px 2px" x-model="currentpage">
                <template x-for="page in pageNumber">
                    <option :value="page" x-text="page"></option>
                </template>
            </select>
        </template>
        <template x-if="currentpage<pageNumber">
            <a href="###" @click="switchPage(currentpage+1)">&raquo;</a>
        </template>
    </div>
</div>