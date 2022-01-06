# laravel-multilang

Installation

Steps:
   
  1. Install the package using the command 

    composer require udiptaweb/laravel-multilang

  2. After installation publish config and migration using 

    php artisan vendor:publish
  
  Then select provider Udiptaweb\LaravelMultilang\LaravelMultilangServiceProvider
    
  This will publish config file named as 
  
    laravel-multilang.php 
    
   and a migration file named as 
    
    2022_01_03_102303_create_translations_table.php
    
 
 Usage:
    
  1. On the model you want to translate
    import the trait
    
    use Udiptaweb\LaravelMultilang\Traits\hasTranslation;
    
  2. Specify the column names which are to be translated by adding on model as 
    
    protected $translable_cols = ['name'];
    

    
    
 3. Write the methods inside boot method on the model as below


        protected static function boot()
        {
           parent::boot();

           static::created(function($model){
               $model->createTranslation();
           });
           static::updated(function($model){
               $model->updateTranslation();
           });
           static::deleted(function($model){
               $model->deleteTranslation();
           });
        }
        
  4.Install google translate <a href="https://github.com/JoggApp/laravel-google-translate"> laravel package </a> and set GOOGLE_TRANSLATE_API_KEY
  
  
  5. Now to translate use the method as shown below

         $user = User::find($id)

         $user->getTranslated('field_name','language')
     
   e.g.
    If you want to translate the field name of user to Hindi, then
     
    $user->getTranslated('name','hi')
     
 Available Languages : 
 
  Avalilable languages are specied on published config file laravel-multilang.php as languages = ['en','hi']
  
 Deafult language : 
    You can change default language by specifying it on default_language filed on laravel-multilang.php
    
    ***You should use language code specified on languages array on laravel-multilang.php
  
