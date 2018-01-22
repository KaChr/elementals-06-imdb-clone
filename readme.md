# Elementals Movie Database

## Production

http://www.lanayru.me

## Develop

http://develop.lanayru.me (admin // elems)

___

## Many-To-Many Relations in Laravel

This is a quick guide on how to structure and define Many-To-Many relationships in Laravel using ledger (or pivot) tables.

### Creating models & migrations

Start by creating the corresponding models and migrations for the relationship. In this example I will use People and Movies

```
$ php artisan make:model Person -m
```
```
$ php artisan make:model Movie -m
```

Step into the newly created migrations and populate them with whatever columns you need.
It's important to remember to keep the "id"-column as we will use it as reference in our pivot/ledger table.

```php
public function up()
{
  Schema::create('people', function(Blueprint $table)
  {
    $table->increments('id');
    $table->string('name');
    $table->string('email');
    $table->timestamps();
  });
}
```

```php
public function up()
{
  Schema::create('movies', function(Blueprint $table)
  {
    $table->increments('id');
    $table->string('title');
    $table->string('body');
    $table->timestamps();
  });
}
```

Run a migrate command to create these tables in the database.

```
$ php artisan migrate
```

### Creating the pivot/ledger-table

Now, lets create our pivot table, in which we will reference the main tables. In terminal:

```
$ php artisan make:migration create_movie_person_table --create=movie_person
```
(Pivot table should always be named with the tables ordered alphabeticly).

Open the new migration and populate it with two columns, like so:

```php
public function up()
{
  Schema::create('movie_person', function(Blueprint $table)
  {
      $table->integer('movie_id')->unsigned();
      $table->foreign('movie_id')->references('id')
            ->on('movies')->onDelete('cascade');

      $table->integer('person_id')->unsigned();
      $table->foreign('person_id')->references('id')
            ->on('people')->onDelete('cascade');

      $table->timestamps();
  });
}
```

Run a migrate once again to create tables.

```
$ php artisan migrate
```

All we need to do now is to define the relationship in the respective Models. Open the Movie.php-Model:

```php
class Movie extends Model
{
    //Add the following method to the model:
    public function people() {
        return $this->belongsToMany('App\Person')
        ->withTimestamps();
      }
}
```

And then the Person.php-Model:

```php
class Person extends Model
{
    //Add the following method to the model:
    public function movies() {
        return $this->belongsToMany('App\Movie')
        ->withTimestamps();
      }
}
```

Now, to seed the pivot table with references, we use the attach-method.
```
$movie = new Movie; //Gets autoincremented id (movie_id)
$movie->title = 'Batman';

$person = new Person; //Gets autoincremented id ($person_id)
$person->name = 'George Clooney'; 

$movie->people()->attach($person_id);
```

If we now do
```
DB::select('select * from movie_person');
=> [                                        
     {#775                                  
       +"movie_id": 1,                      
       +"person_id": 1,                     
       +"created_at": "2017-12-06 21:07:45",
       +"updated_at": "2017-12-06 21:07:45",
     }                             
```

Woop! Done!