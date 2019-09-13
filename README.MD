### Laravel Model Relationship Problem

## Install

    git@github.com:jbrown0824/laravel-model-problem.git
    cd laravel-model-problem
    composer install
    
    # important: Update database env settings before runing this command
    php artisan migrate --seed
    
    php artisan serve
    
Navigate to [localhost:8000/series]() (replace 8000 with the port the command tells you)
    
## The problem

Pretend this is a video series app (kind of like Laracasts). There are seriess of videos that users can watch.

But there's a catch: Users can only watch one series at a time. So there's a `current_series_id` on the users table.

So let's say I want to fetch a user's series (See: `UserSeriesController@index`). I can do this with `User::with('current_series.videos')->first();` (if I don't care about which user for the moment)

However, when I fetch each video, I also want to know if the user has already watched it. this info is stored on a pivot table `user_video` which has an attribute `completed_watching`.

**What is the proper way to include that pivot data on the nested relation `video` within `current_series.video`?**

Note that I'm not fetching the videos through the pivot table because the `current_series.videos` should be returning all videos in the series, regardless of if a user has watched them or not, so I can't use `withPivot` like I am on `User::first()->videos_watched` 
