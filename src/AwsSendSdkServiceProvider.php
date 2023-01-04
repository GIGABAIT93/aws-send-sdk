<?php

namespace Aws\AwsSendSdk;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Aws\AwsSendSdk\AwsSendSdk;

class AwsSendSdkServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   */  public function boot()
  {
    if ($this->app->runningInConsole()) {
      $this->commands([AwsSendSdk::class]);
    }

    $this->app->booted(function () {
      $schedule = app(Schedule::class);
      $schedule->command('aws:send')->everyTwoHours();
    });
  }
  public function register()
  {
  }
}
