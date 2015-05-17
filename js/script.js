$(document).ready(function(){
    setInterval(function () {
        $.getJSON('functions/post.php', { action: 'ajax' }, function(data) {
            //console.dir(data);
            var posts = [];
            $.each(data, function(e, post) {
                posts.push("<li><span>"+post.date+"</span>" +
                "<a href='userpage.php?id="+post.parent_id+"'>"+post.login+"</a><p>"+post.text+"</p></li>");
            });
            $(".block-news .newsticker ul").html(posts.join(""));
            console.info("NEWS UPDATED!");
        });
    }, 2000);
});