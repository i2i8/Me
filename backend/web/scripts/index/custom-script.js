// Toast Notification
$(window).load(function() {
    setTimeout(function() {
        Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
    }, 1500);
    setTimeout(function() {
        Materialize.toast('<span>You can swipe me too!</span>', 3000);
    }, 5000);
    setTimeout(function() {
        Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
    }, 15000);
});