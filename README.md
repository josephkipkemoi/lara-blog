## Setup

<a href="http://lara-blogapp.herokuapp.com/blogs" target="_blank">Deployed API</a>

## Dependencies

<ul>
    <li>PHP 7.3 | 8.0</li>
</ul>

## Getting Started
Setting up project in development mode:

<ul>
    <li>Ensure PHP 7.3 or greater is installed by running: </li>
    <p>php -v </p>
    <li>Clone the repository to your machine and navigate into it:</li>
    <p>git clone https://github.com/josephkipkemoi/larablog</p>
    <li>Install application dependencies</li>
    <p>composer update</p>
    <li>Create a .env file and include the necessary environment variables. NB- copy from the .env.example and fill in the correct values</li>
</ul>

## Database Setup
<p>Setup database locally on your machine, add <mark>larablog</mark> as a value to the respective environment variable as below:</p>
<ul>
    <li>mysql -p['password']</li>
    <li>CREATE DATABASE larablog;</li> 
    <li>exit;</li>
</ul>

## Running the application
<p>Inside the root folder, run the following commands in your terminal</p>

<ul>
    <li>$ php artisan key:generate</li>
    <li>$ php artisan migrate:fresh</li>
    <li>$ php artisan db:seed</li>
    <li>$ php artisan serve</li>
</ul>

## Running the tests
<ul>
    <li>$ ./vendor/bin/phpunit </li>
    <p>Or</p>
    <li>$ php artisan test</li>
 </ul>

## API 
<table>
<h2>User Registration and Authentication</h2>
<tr>
    <th>METHOD</th>
    <th>END POINT</th>
    <th>PARAMS</th>
</tr>
<tr>
    <td>POST</td>
    <td>/register</td>
    <td>json {"name":"Albert Einsten","email":"alber@gmail.com" , "password":"password", "confirm_password":"password"}</td>
</tr>
<tr>
    <td>POST</td>
    <td>/login</td>
    <td>json {"email":"alber@gmail.com", "password": "password"}</td>
</tr>
</table>

<table>
<h2>Blog Post(s)</h2>
<tr>
    <th>METHOD</th>
    <th>END POINT</th>
    <th>PARAMS</th>
</tr>
<tr>
    <td>POST</td>
    <td>api/v1/blogs</td>
    <td>json {"title":"Some cool blog title", "author": "$user->name | Guest", "body":"Some long or shor blog body", "user_id":"$user->id"}</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/blogs</td>
    <td>N/A</td>
</tr>
<tr>
    <td>PATCH</td>
    <td>api/v1/blogs/{$blog->id}</td>
    <td>json {"title":"updated title", "body":"updated body", "author":"Andrew Meakings"}</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/blogs/{$blog->id}</td>
    <td>N/A</td>
</tr>
<tr>
    <td>DELETE</td>
    <td>api/v1/blogs/{$blog->id}</td>
    <td>N/A</td>
</tr>
</table>

<table>
<h2>Tag(s)</h2>
<tr>
    <th>METHOD</th>
    <th>END POINT</th>
    <th>PARAMS</th>
</tr>
<tr>
    <td>POST</td>
    <td>api/v1/tags</td>
    <td>json {"tag":"laravel"}</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/tags/{$blog->id}</td>
    <td>N/A</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/tags/{$tag->id}/blogs</td>
    <td>N/A</td>
</tr>
</table>

<table>
<h2>Comment(s)</h2>
<tr>
    <th>METHOD</th>
    <th>END POINT</th>
    <th>PARAMS</th>
</tr>
<tr>
    <td>POST</td>
    <td>api/v1/blogs/{$blog->id}/comments</td>
    <td>json {"user_id":"$user->id","blog_id":"$blog->id","comment_body":"some cool comment"}</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}</td>
    <td>N/A</td>
</tr>
<tr>
    <td>PATCH</td>
    <td>api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}</td>
    <td>json {"comment_body":"updated comment body"}</td>
</tr>
<tr>
    <td>DELETE</td>
    <td>api/v1/blogs/{$comment->blog_id}/comments/{$comment->id}</td>
    <td>N/A</td>
</tr>
</table>

<table>
<h2>Category</h2>
<tr>
    <th>METHOD</th>
    <th>END POINT</th>
    <th>PARAMS</th>
</tr>
<tr>
    <td>POST</td>
    <td>api/v1/categories</td>
    <td>json {"category":"sports"}</td>
</tr>
<tr>
    <td>GET</td>
    <td>api/v1/categories/{$category->id}</td>
    <td>N/A</td>
</tr>
</table>
