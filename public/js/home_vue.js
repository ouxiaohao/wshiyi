/**
 * vue
 */
$(function () {
    // 侧边栏
    var sidebar_route = '/home/sidebar';
    var vm = new Vue({
        el: '#aside',
        data: {
            todos: []
        },
        mounted: function () {
            axios.get(sidebar_route).then(function (response) {
                vm.todos = response.data;
            });
        }
    });
    // 分类导航
    var cate_route = '/home/cate_list';
    header = new Vue({
        el: '#header',
        data: {
            todos: [],
            nowCate: 0
        },
        mounted: function () {
            axios.get(cate_route).then(function (response) {
                header.todos = response.data;
                var pathname = window.location.pathname;
                var url_param = pathname.split('/');

                if (url_param[1]==='cate') {
                    header.nowCate = url_param[2];
                }
            });
        }
    });







});
