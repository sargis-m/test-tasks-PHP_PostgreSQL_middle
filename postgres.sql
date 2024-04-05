-- Задача 1

-- 1. Выборки пользователей, у которых количество постов больше, чем у пользователя их пригласившего.

SELECT u.*
FROM users u
     JOIN users user_inviter ON u.invited_by_user_id = user_inviter.id
WHERE u.posts_qty > user_inviter.posts_qty;


-- 2. Выборки пользователей, имеющих максимальное количество постов в своей группе.

SELECT u.*
FROM users u
    JOIN (
        SELECT group_id, MAX(posts_qty) AS max_posts
        FROM users
        GROUP BY group_id
) group_user_max_posts ON u.group_id = group_user_max_posts.group_id AND u.posts_qty = group_user_max_posts.max_posts;


-- 3. Выборки групп, количество пользователей в которых превышает 10000.

SELECT group_id
FROM users
GROUP BY group_id
HAVING COUNT(*) > 10000;


-- 4. Выборки пользователей, у которых пригласивший их пользователь из другой группы.

SELECT u.*
FROM users u
     JOIN users user_inviter ON u.invited_by_user_id = user_inviter.id
WHERE u.group_id <> user_inviter.group_id;


-- 5. Выборки групп с максимальным количеством постов у пользователей.

SELECT u.group_id, SUM(u.posts_qty) AS sum_users_posts
FROM users u
GROUP BY u.group_id
HAVING SUM(u.posts_qty) = (
    SELECT SUM(posts_qty) AS max_sum_users_posts
    FROM users
    GROUP BY group_id
    LIMIT 1
);
