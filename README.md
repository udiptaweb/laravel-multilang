# laravel-multilang

Installation

composer require udiptaweb/laravel-multilang

Steps:

  1.After installation pbulish config and migration using php artisan vendor:publish
  
    Then select provider Udiptaweb\LaravelMultilang\LaravelMultilangServiceProvider
    
  2. On the model you want to translate
    import the trait
    
    use Udiptaweb\LaravelMultilang\Traits\hasTranslation;
  3. Specify the column names which are to be translated by adding on model as 
    
    protected $translable_cols = ['name'];
  
