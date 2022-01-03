<?php
namespace Udiptaweb\LaravelMultilang\Traits;

use Udiptaweb\LaravelMultilang\Models\Translation;

trait hasTranslation{
    public function translateOnCreate()
    {
        $translable_cols = $this->translable_cols;
        $languages = config('laravel-multilang.languages');
        $default_language = config('laravel-multilang.default_language');
        foreach($languages as $language){
            if($language != $default_language){
                foreach($translable_cols as $col_name){
                    $data = $this->{$col_name};
                    $translated_data = "i dont know {$data} in {$language}";
                    Translation::firstOrCreate([
                        'content' => $translated_data,
                        'lang_code' => $language,
                        'col_name' => $col_name,
                        'model_id' => $this->id
                    ]);
                }
            }
        }
    }
    public function getTranslated($col_name,$language)
    {
        $translation = Translation::where('model_id',$this->id)->where('col_name',$col_name)->where('lang_code',$language)->first();
        if($translation){
            return $translation->content;
        }
        return '';

    }
}

?>