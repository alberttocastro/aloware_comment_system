# About

A demo of this product can be accessed through: [https://a-single-post-blog.herokuapp.com/](https://a-single-post-blog.herokuapp.com/)

# Requirements

Create a comment system single-page web application using a framework of choice (preferably Laravel 5.5+) and VueJS / React with the following requirements:

- Assume that there is only one Blog Post that can be commented on.
- Only the user’s name and comment text are required to post a comment.
- A comment can be replied to with another comment.
- Nested comments are up to 3 layers only
- The page should not refresh when posting a comment.
- Comments must be ordered by the latest.
- Make the user interface as beautiful, responsive, and easy to use as you can.
- Use MySQL database for storing your data.
- No need to edit, delete, etc of comments.

## What we are looking for:

- Optimal code that is clean and maintainable.
- Business logic organization and software design patterns.
- Optimized SQL performance.
- Documentation.
- Unit tests.

## Important notes:

Start an empty repository in GitHub, commit the base Laravel to the master branch and then start work. (so when we read your code, we can separate it from framework base code).

Don’t make the project complicated; there is no need for user login, live broadcasting, and notifications.

You don’t need to create a User and Post model.

# Documentation

## Running the project

### Requirements

1. NPM
2. PHP
3. Composer

### Procedure

1. Clone this repository to your local machine.
2. Go to the directory and run ``` npm install ```.
3. Then, in the same directory run ``` composer install ```.
4. To make sure the javascript resources are compiled, run ``` npm run production ```.
5. Now, copy the ```.env.example``` file, and adjust it to your computer configuration. It's especially important to adjust the database configurations.
6. Serve the application by using ``` php artisan serve ```.
7. The application will be available through your browser at ```http://localhost:8000```.


## Data

### Comments

Comments can only be added or viewed. They can be nested up to 3 layers. To add up another layer, you should provide the id of the parent.

You can add a comment by making a request to: 

```

POST /api/comment

```

```javascript
{
    'name': 'CommenterName',
    'body': 'Body of the comment',
    'parent_comment_id': '(optional) Id of the comment it is a reply to'
}

```

When retrieving comments, you have to send the following request:

```

GET /api/comment

```

This is an example answer

```javascript

[
    {
        'name': 'Commenter',
        'body': 'commentBody',
        'id': 1,
        'created_at': '2022-03-17T13:08:51.000000Z',
        'child_comments': [
            {
               'name': 'Commenter',
                'body': 'commentBody',
                'id': 2,
                'created_at': '2022-03-17T13:08:51.000000Z',
                'parent_comment_id': 1
            },
            //...
        ] 
    },
    'name': 'Commenter',
    'body': 'commentBody',
    'id': 3,
    'created_at': '2022-03-17T13:08:51.000000Z',
    'child_comments': []
]

```
.
