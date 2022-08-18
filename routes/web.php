<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    //Factory user creation
    // \App\Models\User::factory()->count(3)->create();

    //Seeder address creation
    // \App\Models\Address::create([
    //     'user_id'=>1,
    //     'country'=>'Pakistan'
    // ]);
    // \App\Models\Address::create([
    //     'user_id'=>2,
    //     'country'=>'UK'
    // ]);
    // \App\Models\Address::create([
    //     'user_id'=>3,
    //     'country'=>'USA'
    // ]);

    //Link user to address
    // $user=\App\Models\User::factory()->create();
    // $user->address()->create([
    //     'country'=>'Pakistan'
    // ]);

    // $users=\App\Models\User::all();
    // return view ('users.index',['users'=>$users]);

    //Link address to user
    // $user=\App\Models\User::factory()->create();
    // $address=new \App\Models\Address([
    //     'country'=>'UK'
    // ]);
    // $address->owner()->associate($user);
    // $address->save();

    // $addresses=\App\Models\Address::all();
    // return view ('users.index',['addresses'=>$addresses]);

    // Eager Loading
    // $addresses=\App\Models\Address::with('owner')->get();
    // return view ('users.index',['addresses'=>$addresses]);

    //User having many addresses
    // $users=\App\Models\User::with('addresses')->get();
    // dd($users[0]);
    // $users[0]->addresses()->create([
    //     'country'=>'Nepal'
    // ]);
    // return view ('users.index',['users'=>$users]);

    //Creating and getting posts for users with eager loading
    // $users=\App\Models\User::with('posts')->get();
    // $users[0]->posts()->create([
    //     'title'=>'Post 4'
    // ]);
    // $users[2]->posts()->create([
    //     'title'=>'Post 5'
    // ]);
    // return view ('users.index',['users'=>$users]);

    //Display users having posts
    // $users=\App\Models\User::has('posts','>=',2)->with('posts')->get();
    // return view ('users.index',['users'=>$users]);

    //Display users having posts containing title word
    // $users=\App\Models\User::whereHas('posts',function($query){
    //     $query->where('title','like','%title%');
    // })->with('posts')->get();
    // return view ('users.index',['users'=>$users]);

    //Display users doesn't having posts, also can use wheredoesntHave
    $users=\App\Models\User::doesntHave('posts')->with('posts')->get();
    return view ('users.index',['users'=>$users]);
});
Route::get('/posts',function(){
    //Data added
    // \App\Models\Post::create([
    //     'user_id'=>1,
    //     'title'=>'post title 1'
    // ]);
    // \App\Models\Post::create([
    //     'user_id'=>2,
    //     'title'=>'post title 2'
    // ]);
    
    //Post added by guest (no user id)
    // \App\Models\Post::create([
    //     'title'=>'post title 2'
    // ]);

    // $posts=\App\Models\Post::get();
    // return view('posts.index',['posts'=>$posts]);

    //Add Tags
    // \App\Models\Tag::create([
    //     'name'=>'Laravel'
    // ]);
    // \App\Models\Tag::create([
    //     'name'=>'Php'
    // ]);
    // \App\Models\Tag::create([
    //     'name'=>'Javascript'
    // ]);
    // \App\Models\Tag::create([
    //     'name'=>'Vuejs'
    // ]);

    //Attach post with tag
    // $tag = \App\Models\Tag::first();
    // $post = \App\Models\Post::first();
    // $post->tags()->attach($tag);
    // $post->tags()->attach(2);

    //Check
    // $post = \App\Models\Post::with('tags')->first();
    // dd($post);

    //Attach and detach multiple tags with posts
    // $post = \App\Models\Post::first();
    // $post->tags()->attach([2,3,4]);
    // $post->tags()->detach([2]);
    // $post->tags()->detach();
    // $post->tags()->attach([2,3,4]);
    // $post->tags()->sync([1,2,3,4]);

    //Timestamps of post_tag get
    // $post = \App\Models\Post::first();
    // dd($post->tags->first->pivot->created_at);

    //Attach tag to post with additional column of pivot table
    // $post = \App\Models\Post::first();
    // $post->tags()->attach([
    //     1=>[
    //     'status'=>'approved'
    //     ]
    // ]);

    $posts=\App\Models\Post::with(['user','tags'])->get();
    return view('posts.index',['posts'=>$posts]);
});

Route::get('/tags',function(){
    $tags=\App\Models\Tag::with('posts')->get();
    return view('tags.index',['tags'=>$tags]);
});

Route::get('/projects',function(){
    //Idea for one to many
    //Project
    //User (project_id)
    //Task (user_id)

    //Add in tables
    // $project=\App\Models\Project::create([
    //     'title'=>'Project A'
    // ]);
    // $user1=\App\Models\User::create([
    //     'name'=>'User 1',
    //     'email'=>'user1@example.com',
    //     'password'=> Hash::make('passowrd'),
    //     'project_id'=>$project->id
    // ]);
    // $user2=\App\Models\User::create([
    //     'name'=>'User 2',
    //     'email'=>'user2@example.com',
    //     'password'=> Hash::make('passowrd'),
    //     'project_id'=>$project->id
    // ]);
    // $task1=\App\Models\Task::create([
    //     'title'=>'Task 1 for project 1 by user 1',
    //     'user_id'=>$user1->id
    // ]);
    // $task2=\App\Models\Task::create([
    //     'title'=>'Task 2 for project 1 by user 1',
    //     'user_id'=>$user1->id
    // ]);
    // $task3=\App\Models\Task::create([
    //     'title'=>'Task 3 for project 1 by user 2',
    //     'user_id'=>$user2->id
    // ]);
    // $project2=\App\Models\Project::create([
    //     'title'=>'Project B'
    // ]);
    // $user3=\App\Models\User::create([
    //     'name'=>'User 3',
    //     'email'=>'user3@example.com',
    //     'password'=> Hash::make('passowrd'),
    //     'project_id'=>$project2->id
    // ]);
    // $user4=\App\Models\User::create([
    //     'name'=>'User 4',
    //     'email'=>'user4@example.com',
    //     'password'=> Hash::make('passowrd'),
    //     'project_id'=>$project2->id
    // ]);
    // $user5=\App\Models\User::create([
    //     'name'=>'User 5',
    //     'email'=>'user5@example.com',
    //     'password'=> Hash::make('passowrd'),
    //     'project_id'=>$project2->id
    // ]);
    // $task4=\App\Models\Task::create([
    //     'title'=>'Task 4 for project 2 by user 3',
    //     'user_id'=>$user3->id
    // ]);
    // $task5=\App\Models\Task::create([
    //     'title'=>'Task 5 for project 2 by user 3',
    //     'user_id'=>$user3->id
    // ]);
    // $task6=\App\Models\Task::create([
    //     'title'=>'Task 6 for project 2 by user 4',
    //     'user_id'=>$user4->id
    // ]);
    // $task7=\App\Models\Task::create([
    //     'title'=>'Task 7 for project 2 by user 5',
    //     'user_id'=>$user5->id
    // ]);

    // $project=\App\Models\Project::find(1);
    // return $project->users[0]->tasks;
    // return $project->tasks;
    // return $project->task;


    //Idea for many to many
    //Project
    //User
    //project_user (project_id, user_id)
    //Task (user_id)

    //Add in tables
    // $project1=\App\Models\Project::create([
    //     'title'=>'Project A'
    // ]);
    // $project2=\App\Models\Project::create([
    //     'title'=>'Project B'
    // ]);
    // $user1=\App\Models\User::create([
    //     'name'=>'User A',
    //     'email'=>'userA@example.com',
    //     'password'=> Hash::make('passowrd'),
    // ]);
    // $user2=\App\Models\User::create([
    //     'name'=>'User B',
    //     'email'=>'userB@example.com',
    //     'password'=> Hash::make('passowrd'),
    // ]);
    // $user3=\App\Models\User::create([
    //     'name'=>'User C',
    //     'email'=>'user@example.com',
    //     'password'=> Hash::make('passowrd'),
    // ]);
    // $project1->users()->attach($user1);
    // $project1->users()->attach($user2);
    // $project1->users()->attach($user3);
    // $project2->users()->attach($user1);
    // $project2->users()->attach($user3);
    // \App\Models\Task::create([
    //     'title'=>'Task A',
    //     'user_id'=>1
    // ]);
    // \App\Models\Task::create([
    //     'title'=>'Task B',
    //     'user_id'=>1
    // ]);
    // \App\Models\Task::create([
    //     'title'=>'Task C',
    //     'user_id'=>2
    // ]);
    // \App\Models\Task::create([
    //     'title'=>'Task D',
    //     'user_id'=>3
    // ]);
    
    // $project2=\App\Models\Project::find(2);
    // return $project2->users;

    // $user=\App\Models\User::find(1);
    // return $user->projects;

    //laravel_through_key is the project id
    $project=\App\Models\Project::find(1);
    return $project->tasks;
    // return $project->task;
});
