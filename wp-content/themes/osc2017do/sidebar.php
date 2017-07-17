    <div class="sidebar" id="baggage" v-bind:class="{ 'sidebar-open': sidebarShow }">
        <h3><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> カートの中身</h3>
        <button type="button" class="btn btn-primary pull-right" v-bind:class="{ disabled : baggage.length == 0 }" v-on:click="register">
            <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> 注文する
        </button>
        <transition-group name="flip-list" tag="ul" class="list-group">
        <!-- <ul class="list-group"> -->
            <li class="list-group-item" v-for="item in baggage" v-bind:key="item">
                <a v-bind:href="item.permalink">{{ item.title }}</a>
                <a href="#" v-on:click="remove(item.id)">
                    <span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
                </a>
            </li>
        <!-- </ul> -->
        </transition-group>
    </div>
    <div class="sidebar-overlay" v-bind:class="{ 'sidebar-open': sidebarShow }" v-on:click="toggleSidebar"></div>
