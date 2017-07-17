new Vue({
    /**
     * Vue.js 処理対象となる html の範囲を設定
     */
    el: '#cart',
    /**
     * データー
     */
    data: {
        // WordPress REST API のエンドポイント
        resturl: '',
        // サイドバーの表示状態
        sidebarShow: false,
        // 商品一覧
        items: [],
        // ページネーション情報
        pagination: [],
        // カートに入れた商品
        baggage: []
    },
    /**
     * イベント（created）
     */
    created: function () {
        // endpoint 設定
        this.resturl = jQuery("#resturl").val();
        // 初期表示(1ページ目)
        this.query(1);
    },
    computed: {
        canPrev: function() {
            if(this.pagination.current <= 1) {
                return false;
            }
            return true;
        },
        canNext: function() {
            if(this.pagination.current >= this.pagination.max_num_pages) {
                return false;
            }
            return true;
        },
        pageNums: function() {
            var nums = []
            for(i = 1; i <= this.pagination.max_num_pages; i++) {
                nums.push(i);
            }
            return nums;
        }
    },
    /**
     * メソッド
     */
    methods: {
        /**
         * サイドバーの表示をトグルする.
         */
        toggleSidebar: function(id) {
            this.sidebarShow = !this.sidebarShow;
            if(!Number.isInteger(id)) return;
            var search = this.items.filter((item, index) => {
                if(item.id == id) return true;
            });
            // console.log(search);
            this.baggage.push(search[0]);
        },
        remove: function(id) {
            for(var i = 0; i < this.baggage.length; i++) {
                if(this.baggage[i].id == id) {
                    this.baggage.splice(i, 1);
                    break;
                }
            }
        },
        contains: function(id) {
            var search = this.baggage.filter((item, index) => {
                if(item.id == id) return true;
            });
            if(search.length == 0) {
                return { disabled: false };
            }
            return { disabled: true };
        },
        /**
         * 注文画面に遷移する.
         */
        register: function() {
            alert("注文");
        },
        /**
         * 商品の検索を行う.
         */
        query: function(paged) {
            axios.get(this.resturl + "/items/" + paged).then((response) => {
                this.items = response.data.items;
                this.pagination = response.data.pagination;
            })
        }
    }
})
