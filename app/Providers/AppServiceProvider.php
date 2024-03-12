<?php

namespace App\Providers;

use App\Repositories\Photo\Comment\EloquentPhotoCommentRepository;
use App\Repositories\Photo\Comment\PhotoCommentRepositoryInterface;
use App\Repositories\Photo\EloquentPhotoRepository;
use App\Repositories\Photo\PhotoRepositoryInterface;
use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register()
  {
    $this->app->bind(
      PhotoRepositoryInterface::class,
      EloquentPhotoRepository::class,
    );
    $this->app->bind(
      PhotoCommentRepositoryInterface::class,
      EloquentPhotoCommentRepository::class,
    );
    $this->app->bind(
      UserRepositoryInterface::class,
      EloquentUserRepository::class,
    );
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
