<?php
function get_categories()
{
    $sql = "select category.category_name as cname, category.category_id as cid, post.*, user.user_image from category
join post on post.category_id = category.category_id
join user on user.user_id = post.manager_id
group by category.category_name
order by rand() limit 3
";
    return select_rows($sql);
}

function get_category_count()
{
    $sql = "select category.category_name as cname, category.category_id as cid, post.*, user.user_image from category
join post on post.category_id = category.category_id
join user on user.user_id = post.manager_id
group by category.category_name
order by rand() limit 3
";
    return sql_counter($sql);
}

