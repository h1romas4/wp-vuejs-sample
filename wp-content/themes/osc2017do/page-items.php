<?php get_header(); ?>
<div class="row">
    <div class="col-xs-3" v-for="item in items">
        <div class="thumbnail">
            <img v-bind:src="item.thumbnail" />
            <div class="caption">
                <h3><a v-bind:href="item.permalink">{{ item.title }}</a></h3>
                <div class="excerpt">{{ item.excerpt }}</div>
                <div class="price">{{ item.price }} 円</div>
                <div class="register">
                    <a href="#" class="btn btn-primary" v-bind:class="contains(item.id)" role="button" v-on:click="toggleSidebar(item.id)">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        カート入れ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        <li v-bind:class="{ disabled : !canPrev }">
            <a href="#" v-on:click="query(1)" aria-label="Previous" class="disabled">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li v-for="num in pageNums" v-bind:class="{ active : num == pagination.current }">
            <a href="#" v-on:click="query(num)">{{ num }}</a>
        </li>
        <li v-bind:class="{ disabled : !canNext }">
            <a href="#" v-on:click="query(pagination.current + 1)" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
