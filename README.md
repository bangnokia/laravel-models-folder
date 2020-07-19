# Laravel Models folder

[![Build Status](https://travis-ci.org/bangnokia/laravel-models-folder.svg?branch=master)](https://travis-ci.org/bangnokia/laravel-models-folder) [![StyleCI](https://github.styleci.io/repos/185553210/shield?branch=master)](https://github.styleci.io/repos/185553210)

This package will create all models into the `app\Models` folder as default when you execute command `artisan make:model`.

All your models created by this command will be extends `App\Models\Model` instead of `Illuminate\Database\Eloquent\Model` by default.


## Installation

In your Laravel project, run command 
```bash
composer require bangnokia/laravel-models-folder --dev
```
