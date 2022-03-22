$(".table-responsive").on("click", "#published", function (e) {
    e.preventDefault();
    console.log($(this).data("user_id"));
    blog_id = $(this).data("blog_id");
    $.ajax({
        method: "POST",
        url: "http://localhost:8080/admin/publish",
        data: { blog_id: blog_id },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        // console.log(data);
         window.location.reload();
    });
});

$(".table-responsive").on("click", "#pending", function (e) {
    e.preventDefault();
    console.log($(this).data("user_id"));
    blog_id = $(this).data("blog_id");
    $.ajax({
        method: "POST",
        url: "http://localhost:8080/admin/pending",
        data: { blog_id: blog_id },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        // console.log(data);
         window.location.reload();
    });
});

$(".table-responsive").on("click", "#delete", function (e) {
    e.preventDefault();
    console.log($(this).data("user_id"));
    blog_id = $(this).data("blog_id");
    $.ajax({
        method: "POST",
        url: "http://localhost:8080/admin/deletePost",
        data: { blog_id: blog_id },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        // console.log(data);
        window.location.reload();
    });
});

$(".table-responsive").on("click", "#trending", function (e) {
    e.preventDefault();
    val = $(this).val();
    blog_id = $(this).data("blog_id");
    $.ajax({
        method: "POST",
        url: "http://localhost:8080/admin/trendingPost",
        data: { 'blog_id': blog_id , 'val' : val },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        //  console.log(data);
        //  window.location.reload();

    });

});