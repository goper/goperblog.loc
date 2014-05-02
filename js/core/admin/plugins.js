$(document).ready(function() {
    /**
     * Дерево категорий
     */
    $('.admin.category.index ul').treeview({
        animated: 'fast',
        collapsed: true,
        unique: true,
        persist: 'cookie'
    });
});