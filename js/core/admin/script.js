$(document).ready(function() {
    /**
     * Автоматический алиас в категориях
     */
    $('form #Category_name').keyup(function() {
        var val_name = aliasCorrect($(this).val());
        $('form #Category_alias').val(val_name);
    });
});
