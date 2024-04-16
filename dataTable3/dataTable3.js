import axiosClient from "./cdn/axios.js";

const dataTable3 = ({
    sql = null,
    sql_count = null,
    sortField = 'id',
    columns = [],
    primary = 'id',
}) => ({
    currentpage: 1,
    sortField,
    sortDirection: 'desc',
    limit: 50,
    data: [],
    primary,
    sql,
    search: '',
    startRow: 0,
    pageNumber: 10,
    dataLangth: 0,
    columns,
    isLoading: false,

    init() {
        this.getRowData();
    },

    switchPage(page) {
        this.currentpage = page;
        this.getRowData();
    },
    selectPage(event){
        this.currentpage = event.target.value;
        this.getRowData();
    },
    async getRowData() {
        this.isLoading = true;
        this.startRow = (this.currentpage - 1) * this.limit;
        const res = await axiosClient('/getRowData.php', {
            params: {
                sql: this.sql,
                sortDirection: this.sortDirection,
                sortField: this.sortField,
                limit: this.limit,
                search: this.search,
                startRow: this.startRow,
            },
        });
        this.data = res.data;
        this.getDataCount();
        setTimeout(()=>{
            this.isLoading = false;
        }, 500)
    },

    async getDataCount() {
        const res = await axiosClient('/getDataCount.php', { params: { sql_count, search: this.search } });
        this.dataLangth = res.data;
        this.pageNumber = Math.ceil(this.dataLangth / this.limit);
    },

    sort(column) {
        this.sortDirection = this.sortField === column ? (this.sortDirection === 'asc' ? 'desc' : 'asc') : 'desc';
        this.sortField = column;
        this.getRowData();
    },
});

window.dataTable3 = dataTable3;
