$( document ).ready(function() {
    var $resultat = $('pre#resultat');
    var $probleme = $("select#probleme_id");
    var $input = $("textarea#body");

    if ( $resultat.length == 0 && $probleme.length == 0) {
        console.log("oops");
        return;
    }

    solve();
    $input.keyup( function () {
        solve();
    });
    $probleme.change( function () {
        solve();
    });

    function solve() {
        $.post( "/solver", { probleme: $probleme.val(), input: $input.val()
        }).done(function( data ) {
            console.log(data.result);
            $resultat.text(data.result);
        }).fail(function(data) {
            console.log(data.result);
        });
    }
});
