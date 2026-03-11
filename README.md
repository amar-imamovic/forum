#### FORUM


## DATABSE STRUCTURE

users
roles
categories
posts
comments
likes

Posts table:

posts
id
user_id
category_id
title
body
comment_count
like_count
pinned
created_at

Comments table:

comments
id
post_id
user_id
body
created_at

Likes table:

likes
id
user_id
post_id
created_at
